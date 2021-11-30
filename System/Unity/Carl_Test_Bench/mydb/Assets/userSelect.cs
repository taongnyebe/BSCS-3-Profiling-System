using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class userSelect : MonoBehaviour
{
    string URL = "http://localhost/BSCS-3-Profiling-System/System/Unity/Carl_Test_Bench/mydb/Assets/userSelect.php";
    public string [] usersData;

    //Use this for initialization
    IEnumerator Start(){
        WWW users = new WWW (URL);
        yield return users;
        string usersDataString = users.text;
        usersData = usersDataString.Split (';');

        print (GetValueData(usersData[0],"username:"));
    }

    string GetValueData(string data, string index){
        string value = data.Substring (data.IndexOf(index)+index.Length);
        if(value.Contains("|")){
            value = value.Remove (value.IndexOf("|"));
        }
        return value;
    }
   
    // Update is called once per frame
    void Update()
    {
        
    }
}
