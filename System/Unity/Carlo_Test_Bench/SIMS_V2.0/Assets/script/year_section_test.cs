using System.Collections;
using System.Collections.Generic;
using UnityEngine;

using UnityEngine.UI;
using System;
using TMPro;

public class year_section_test : MonoBehaviour
{
    void Start()
    {
        StartCoroutine(YearSection());
    }

    IEnumerator YearSection()
    {
        Debug.Log("check 1");
        WWW webyearsection = new WWW("http://localhost/PHP-Codes/BSCS-3-Profiling-System/System/CS-SIMS/php-home/yearsection.php");
        Debug.Log("check 2");
        yield return webyearsection;
        Debug.Log("check 3");

        if (webyearsection.text != "Table is Empty")
        {
            string[] ysResult = webyearsection.text.Split('\t');
            Debug.Log("This is their Count: " + ysResult[0]);

            GameObject ysTemplate = transform.GetChild(0).gameObject;
            GameObject g;
            Debug.Log("check 4");
            
            for (int i=1; i <= int.Parse(ysResult[0])*2; i += 2)
            {
                int b = i;
                Debug.Log("loop check 5 " + b);
                string yearandsection = "BS in Computer Science " + ysResult[b] + " - " + ysResult[b+1];

                g = Instantiate (ysTemplate, transform);
                g.transform.GetChild(0).GetComponent<TextMeshProUGUI>().text = yearandsection;

                g.GetComponent <Button>().onClick.AddListener(delegate(){
                    ItemClicked(i);
                });
            }

            Destroy (ysTemplate);
        }
        else if (webyearsection.text == "1")
        {
            Debug.Log("Error");
        }
        else if (webyearsection.text == "Table is Empty"){
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
