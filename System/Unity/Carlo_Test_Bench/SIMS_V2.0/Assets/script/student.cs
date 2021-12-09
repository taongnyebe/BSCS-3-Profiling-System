using System.Collections;
using System.Collections.Generic;
using UnityEngine;

using UnityEngine.UI;
using System;
using TMPro;

public class student : MonoBehaviour
{
    void Start()
    {
        
    }

    public void ClassList()
    {
        StartCoroutine(StudentData());
    }

    IEnumerator StudentData()
    {
        Debug.Log("check 1");
        WWW webStudentData = new WWW("http://localhost/PHP-Codes/BSCS-3-Profiling-System/System/CS-SIMS/php-home/studentData.php");
        Debug.Log("check 2");
        yield return webStudentData;
        Debug.Log("check 3");

        if (webStudentData.text != "Table is Empty")
        {
            string[] ysResult = webStudentData.text.Split('\t');
            Debug.Log("This is their Count: " + ysResult[0]);

            GameObject ysTemplate = transform.GetChild(0).gameObject;
            GameObject g;
            Debug.Log("check 4");
            
            for (int i=1; i <= int.Parse(ysResult[0])*2; i += 2)
            {
                int b = i;
                Debug.Log("loop check 5 " + b);
                string yearandsection = ysResult[4] + ", " + ysResult[2] + " ." + ysResult[3][0] + " " + ysResult[5];

                g = Instantiate (ysTemplate, transform);
                g.transform.GetChild(0).GetComponent<TextMeshProUGUI>().text = yearandsection;

                g.GetComponent <Button>().onClick.AddListener(delegate(){
                    ItemClicked(i);
                });
            }

            Destroy (ysTemplate);
        }
        else if (webStudentData.text == "1")
        {
            Debug.Log("Error");
        }
        else if (webStudentData.text == "Table is Empty"){
            Debug.Log("Table is Empty");
        }
        else
            Debug.Log("error");
    }

    void ItemClicked (int itemIndex)
    {
        Debug.Log("item " + itemIndex + " clicked");
    }
}
