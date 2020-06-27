using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using Vuforia;
using UnityEngine.UI;
using System;
using Image = UnityEngine.UI.Image;

public class Controller : MonoBehaviour
{

    public GameObject[] UIScreens;
    public Text  warningtext; 
    public Sprite[] bgSprites;
    public Image sliderImage;
    public GameObject splashImage,blackSceen;
    public static Controller Instance;
    public string[] namesList;
    public List<string> runTimeNameList = new List<string>();
    public string sName;
    float startTime, waitTime;
    [HideInInspector] public bool found;

    //public TextTracker textTracker;

    private void Awake()
    {
        if (Instance == null)
        {
            Instance = this;
        }
        //textTracker = TrackerManager.Instance.GetTracker<TextTracker>();

        GetStudentNamesFromDatabase();

    }


    void Start()
    {
        timetableEmpty();
        StartCoroutine(showSplash());
        MainMenuBgChange();
    }
    int counter = 0;
    IEnumerator showSplash()
    {
        splashImage.SetActive(true);
        yield return new WaitForSeconds(2f);
        blackSceen.SetActive(true);
        yield return new WaitForSeconds(0.5f);
        splashImage.SetActive(false);
        UIScreens[0].SetActive(true);

        yield return new WaitForSeconds(0.5f);
        blackSceen.SetActive(false);
    }
    
    void MainMenuBgChange()
    {
        if(counter>3)
        {
            counter = 0;
        }
       sliderImage.sprite = bgSprites[counter];
        counter++;
        Invoke("MainMenuBgChange", 4);
    }
    public void GetStudentNamesFromDatabase()
    {
        //string url = "https://arapp112233.000webhostapp.com/GetStudentList.php";
        string url = "http://localhost/GetStudentList.php";

        WWWForm form = new WWWForm();
        WWW www = new WWW(url);
        StartCoroutine(waitForDBReport(www));
    }

    IEnumerator waitForDBReport(WWW www)
    {
        yield return www;
        namesList = www.text.Split(char.Parse(","));
        // check for errors
        if (www.error == null)
        {
            Debug.Log("WWW Ok!: " + www.text);
        }
        else
        {
            Debug.Log("WWW Error: " + www.error);
        }
    }

    string[] subName;
    int nameCounter = 0;

    public void foundName()
    {

        for (nameCounter = 0; nameCounter < namesList.Length - 1; nameCounter++)
        {
            subName = namesList[nameCounter].Split(char.Parse(" "));
            for (int j = 0; j < subName.Length; j++)
            {
                if (subName.Length == runTimeNameList.Count)
                {
                    match(subName);
                    break;
                }

            }



        }
    }
    bool OneTime;
    void match(string[] sub)
    {
        for (int i = 0; i < sub.Length; i++)
        {
            if (runTimeNameList.Contains(sub[i]) && !OneTime)
            {
                sName = namesList[nameCounter];
                OneTime = true;
                //textTracker.Stop();
                warningtext.gameObject.SetActive(true);
                GetStudentInfo();
            }
        }
        //if(temp == sub.Length)
        //{

        //}
    }

    public void onClickStartBtn()
    {
        UIScreens[0].SetActive(false);
        UIScreens[1].SetActive(true);
        startTime = Time.time;
        waitTime = startTime + 10;

        // InvokeRepeating("timeCheck", 1.0f, 1.0f);
    }
    void timeCheck()
    {

        if (waitTime < Time.time)
        {
           // textTracker.Stop();

            UIScreens[2].SetActive(true);
        }
        if (found)
        {
            CancelInvoke();
        }
    }
    public void onClickReset()
    {
        UIScreens[3].SetActive(false);
        UIScreens[4].SetActive(false);
        UIScreens[5].SetActive(false);
        UIScreens[8].SetActive(false);
        UIScreens[9].SetActive(false);
        runTimeNameList.Clear();
        sName = "";
        OneTime = false;
        found = false;

    }

    public Text SnameText, SnameTextProfile, FNameText, RegNoText,RegNoTextProfile,Section,RegCources;
    void GetStudentInfo()
    {
        string url = "http://localhost/GetStudentInfo.php";


        WWWForm form = new WWWForm();
        form.AddField("SNamePost", sName);
        WWW www = new WWW(url, form);
        StartCoroutine(waitForStudentInfo(www));
    }


    IEnumerator waitForStudentInfo(WWW www)
    {
        yield return www;
        string[] Cources = www.text.Split(char.Parse("|"));
        string[] data = Cources[1].Split(char.Parse(","));
        string[] courseName = Cources[0].Split(char.Parse(","));
        RegCources.text = "";
        for (int i = 0; i < courseName.Length-1; i++)
        {
            RegCources.text = RegCources.text +" ,"+ courseName[i];
        }
        Section.text = data[3];
        warningtext.gameObject.SetActive(false);

        // check for errors
        if (www.error == null)
        {
            Debug.Log("WWW Ok!: " + www.text);
            SnameText.text = data[0];
            SnameTextProfile.text = data[0];
            FNameText.text = data[1];
            RegNoText.text = data[4] + "-" + data[3] + "-" + data[2];
            RegNoTextProfile.text = data[4] + "-" + data[3] + "-" + data[2];
            _sesstionId = data[4];
            _programId = data[3];
            _studentId = data[2];
            UIScreens[1].SetActive(false);
            UIScreens[3].SetActive(true);
            UIScreens[7].SetActive(false);

        }
        else
        {
            Debug.Log("WWW Error: " + www.error);
        }
    }

    public string _studentId, _sesstionId, _programId;

    public void OnClickAttandanceButton()
    {
        UIScreens[4].SetActive(true);
        UIScreens[3].SetActive(false);
        UIScreens[9].SetActive(false);

        string url = "http://localhost/Attandance.php";


        WWWForm form = new WWWForm();
        form.AddField("studentIdPost", _studentId);
        form.AddField("programIdPost", _programId);
        form.AddField("SessionIdPost", _sesstionId);
        WWW www = new WWW(url, form);
        StartCoroutine(waitForAttandence(www));
    }
    public void OnClickMarksButton()
    {
        UIScreens[8].SetActive(true);
        UIScreens[3].SetActive(false);
        UIScreens[9].SetActive(false);

        string url = "http://localhost/Marks.php";


        WWWForm form = new WWWForm();
        form.AddField("studentIdPost", _studentId);
        form.AddField("programIdPost", _programId);
        form.AddField("SessionIdPost", _sesstionId);
        WWW www = new WWW(url, form);
        StartCoroutine(waitForMarks(www));
    }

    IEnumerator waitForMarks(WWW www)
    {
        yield return www;
        string[] temp= www.text.Split(char.Parse("|"));
        for (int i = 0; i < temp.Length-1; i++)
        {
            string[] subTemp = temp[i].Split(char.Parse(","));
            Debug.Log("String parse 0  " + subTemp[0]);
            Debug.Log("String parse 1  " + subTemp[1]);
            Debug.Log("String parse 2  " + subTemp[2]);
            Debug.Log("String parse 3  " + subTemp[3]);
            marksSubPenals[i].SetActive(true);
            marksSubPenals[i].transform.GetChild(0).GetComponent<Text>().text = subTemp[0];
            marksSubPenals[i].transform.GetChild(1).GetComponent<Text>().text = subTemp[1];
            marksSubPenals[i].transform.GetChild(2).GetComponent<Text>().text = subTemp[2];
            marksSubPenals[i].transform.GetChild(3).GetComponent<Text>().text = subTemp[3];
            int internalMarks = int.Parse(subTemp[1]);
            int external = int.Parse(subTemp[2]);
            int TotalMarks = internalMarks+external;
            if(TotalMarks <=100 && TotalMarks>= 90)
            {
                marksSubPenals[i].transform.GetChild(4).GetComponent<Text>().text = "A+";

            }else if(TotalMarks < 90 && TotalMarks >= 85)
            {
                marksSubPenals[i].transform.GetChild(4).GetComponent<Text>().text = "A";

            }else if(TotalMarks < 85 && TotalMarks >= 80)
            {
                marksSubPenals[i].transform.GetChild(4).GetComponent<Text>().text = "B+";

            }else if(TotalMarks < 80 && TotalMarks >= 75)
            {
                marksSubPenals[i].transform.GetChild(4).GetComponent<Text>().text = "B";

            }else if(TotalMarks < 75 && TotalMarks >= 70)
            {
                marksSubPenals[i].transform.GetChild(4).GetComponent<Text>().text = "C+";

            }else if(TotalMarks < 70 && TotalMarks >= 65)
            {
                marksSubPenals[i].transform.GetChild(4).GetComponent<Text>().text = "C";

            }else if(TotalMarks < 65 && TotalMarks >= 60)
            {
                marksSubPenals[i].transform.GetChild(4).GetComponent<Text>().text = "D+";

            }else if(TotalMarks < 60 && TotalMarks >= 50)
            {
                marksSubPenals[i].transform.GetChild(4).GetComponent<Text>().text = "D";

            }else if(TotalMarks < 50)
            {
                marksSubPenals[i].transform.GetChild(4).GetComponent<Text>().text = "F";

            }
        }
    }
    public GameObject[] marksSubPenals;

    public string[] c1;
    public int PCounter;
    public GameObject[] CourseSlider;
    public GameObject[] CourseTextObj;
    IEnumerator waitForAttandence(WWW www)
    {
        yield return www;

        c1 = www.text.Split(char.Parse("|"));


        for (int i = 0; i < c1.Length - 1; i++)
        {
            if (i <= CourseSlider.Length)
            {
                CourseSlider[i].SetActive(true);
                CourseTextObj[i].SetActive(true);
                string[] tempp = c1[i].Split(char.Parse(","));
                CourseTextObj[i].transform.GetChild(0).GetComponent<Text>().text = tempp[0];
                PCounter = 0;
                for (int j = 0; j < tempp.Length - 1; j++)
                {
                    if (tempp[j] == "Present")
                    {
                        PCounter++;

                    }
                }
                int a = tempp.Length - 2;
                float percentage = (float)(PCounter / (float)a);
                Debug.Log("percentage  " + percentage);
                CourseTextObj[i].transform.GetChild(1).GetComponent<Text>().text = (percentage * 100).ToString("##") + " %";
                float temp = (float)(percentage * 100)/100;
                Debug.Log("Temp" + temp);
                CourseSlider[i].transform.localScale = new Vector3(CourseSlider[i].transform.localScale.x, (float)(temp * 435), CourseSlider[i].transform.localScale.z);


            }
        }

        if (www.error == null)
        {
            Debug.Log("WWW Ok!: " + www.text);
        }
        else
        {
            Debug.Log("WWW Error: " + www.error);
        }
    }


    public Text timeTableHeader;
    public void onClickTimeTableButton()
    {
        UIScreens[5].SetActive(true);
        UIScreens[3].SetActive(false);
        UIScreens[9].SetActive(false);

        string url = "http://localhost/TimeTable.php";


        WWWForm form = new WWWForm();
        //form.AddField("studentIdPost", _studentId);
        //form.AddField("programIdPost", _programId);
        Debug.Log("Sesstion ID" + _sesstionId);
        form.AddField("SessionIdPost", _sesstionId);
        WWW www = new WWW(url, form);
        StartCoroutine(waitforTimeTable(www));
    }
    public string[] data;
    public GameObject[] TimeTableDay;
    int tempNO;
    bool oneTime;
    IEnumerator waitforTimeTable(WWW www)
    {
        yield return www;
         data = www.text.Split(char.Parse("|"));
       // check for errors
        if (www.error == null)
            {
                for (int i = 0; i < data.Length - 1; i++)
                {
                    string[] temp = data[i].Split(char.Parse(","));
                Debug.Log("Length  " + temp.Length);
                if(temp.Length == 5&& !oneTime)
                {
                     timeTableHeader.text = _programId.ToUpper() + "-" + temp[0];
                    tempNO = 1;
                    oneTime = true;
                }
                else if(temp.Length == 4 && !oneTime)
                {
                    timeTableHeader.text = _programId.ToUpper();
                    oneTime = true;

                    tempNO = 0;
                }
                    if (temp[0+tempNO] == "Monday")
                    {
                        TimeTableDay[0].transform.GetChild(int.Parse(temp[1 + tempNO])).transform.GetChild(0).GetComponent<Text>().text = temp[3 + tempNO];
                        TimeTableDay[0].transform.GetChild(int.Parse(temp[1 + tempNO])).transform.GetChild(1).GetComponent<Text>().text = temp[2 + tempNO];
                    }
                    else if (temp[0 + tempNO] == "Tuesday")
                    {
                        TimeTableDay[1].transform.GetChild(int.Parse(temp[1 + tempNO])).transform.GetChild(0).GetComponent<Text>().text = temp[3 + tempNO];
                        TimeTableDay[1].transform.GetChild(int.Parse(temp[1 + tempNO])).transform.GetChild(1).GetComponent<Text>().text = temp[2 + tempNO];
                    }
                    else if (temp[0 + tempNO] == "Wednasday")
                    {
                        TimeTableDay[2].transform.GetChild(int.Parse(temp[1 + tempNO])).transform.GetChild(0).GetComponent<Text>().text = temp[3 + tempNO];
                        TimeTableDay[2].transform.GetChild(int.Parse(temp[1 + tempNO])).transform.GetChild(1).GetComponent<Text>().text = temp[2 + tempNO];
                    }
                    else if (temp[0 + tempNO] == "Thrusday")
                    {
                        TimeTableDay[3].transform.GetChild(int.Parse(temp[1 + tempNO])).transform.GetChild(0).GetComponent<Text>().text = temp[3 + tempNO];
                        TimeTableDay[3].transform.GetChild(int.Parse(temp[1 + tempNO])).transform.GetChild(1).GetComponent<Text>().text = temp[2 + tempNO];
                    }
                    else if (temp[0 + tempNO] == "Friday")
                    {
                        TimeTableDay[4].transform.GetChild(int.Parse(temp[1 + tempNO])).transform.GetChild(0).GetComponent<Text>().text = temp[3];
                        TimeTableDay[4].transform.GetChild(int.Parse(temp[1 + tempNO])).transform.GetChild(1).GetComponent<Text>().text = temp[2];
                    }
                }

            oneTime = false;
            }
            else
            {
                Debug.Log("WWW Error: " + www.error);
            }
    }

    public void SwitchScreen(GameObject screen)
    {
        for (int i = 0; i < UIScreens.Length; i++)
        {
            if(UIScreens[i] == screen)
            {
                UIScreens[i].SetActive(true);
            }else
            {
                UIScreens[i].SetActive(false);
            }
        }
    }

    void timetableEmpty()
    {
        for (int i = 0; i < TimeTableDay.Length; i++)
        {
            for (int j = 1; j < 7; j++)
            {
                TimeTableDay[i].transform.GetChild(j).transform.GetChild(0).GetComponent<Text>().text = "";
                TimeTableDay[i].transform.GetChild(j).transform.GetChild(1).GetComponent<Text>().text = "";
                TimeTableDay[i].transform.GetChild(j).transform.GetChild(2).GetComponent<Text>().text = "";
            }
        }
    }

    public void onClickAboutUs()
    {
        UIScreens[6].SetActive(true);
    }
    public void AboutUsBackButton()
    {
        UIScreens[6].SetActive(false);

    }

    public void BackToMainMenu()
    {
        onClickReset();

        UIScreens[1].SetActive(false);
        UIScreens[7].SetActive(false);
        UIScreens[0].SetActive(true);
    }

    public void onClickExitBtn()
    {
        Application.Quit();
    }

    public void onClickIPAddressBackBtn()
    {
        UIScreens[7].SetActive(false);
    }public void onClickIPAddresBtn()
    {
        UIScreens[7].SetActive(true);
    }

    public void onClickOptionBtn()
    {
        UIScreens[7].SetActive(true);
        UIScreens[9].SetActive(false);
    }

    public void onClickMarksBackBtn()
    {
        UIScreens[1].SetActive(true);
        UIScreens[8].SetActive(false);


    }

    public void sidePenalBackBtn()
    {
        UIScreens[7].SetActive(false);

    }
    public void Myprofile()
    {
        UIScreens[7].SetActive(false);
        UIScreens[9].SetActive(true);

    }
}
