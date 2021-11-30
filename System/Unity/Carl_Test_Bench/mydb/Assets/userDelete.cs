using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class userDelete : MonoBehaviour
{
   
    string URL = "http://localhost/BSCS-3-Profiling-System/System/Unity/Carl_Test_Bench/mydb/Assets/userDelete.php";
    public string  WhereField, WhereCondition;

    // Start is called before the first frame update
    void Start()
    {
        
    }

    // Update is called once per frame
    void Update()
    {
        if(Input.GetKeyDown(KeyCode.Space)){
            DelUser (WhereField, WhereCondition);
        }
    }

    public void DelUser(string wF, string wC ){
        WWWForm form = new WWWForm ();
        form.AddField ("whereField", wF);
        form.AddField ("whereCondition", wC);

        WWW www = new WWW (URL, form);
    }
}
