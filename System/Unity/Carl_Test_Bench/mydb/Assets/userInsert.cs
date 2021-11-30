using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class userInsert : MonoBehaviour
{
    string URL = "http://localhost/BSCS-3-Profiling-System/System/Unity/Carl_Test_Bench/mydb/Assets/userInsert.php";
    public string InputUsername, InputEmail, InputPassword;


    // Start is called before the first frame update
    void Start()
    {
        
    }

    // Update is called once per frame
    void Update()
    {
        if(Input.GetKeyDown(KeyCode.Space)){
            AddUser (InputUsername, InputEmail, InputPassword);
        }
    }

    public void AddUser(string username, string email, string password){
        WWWForm form = new WWWForm ();
        form.AddField ("addUsername", username);
        form.AddField ("addEmail",  email);
        form.AddField ("addPassword", password);

        WWW www = new WWW (URL, form);
    }
}
