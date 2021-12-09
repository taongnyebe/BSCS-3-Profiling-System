using UnityEngine;
using UnityEngine.Networking;
using System.Collections;
using System.Collections.Generic;
using UnityEngine.UI;
using System;
using TMPro;

public class year_section_d : MonoBehaviour
{

      // this should detect the id of the yearsection to be set to deactivation
      [SerializeField] private string delete = "http://localhost/PHP-Codes/BSCS-3-Profiling-System/System/CS-SIMS/php-home/yearsection.php";


      public void DeactivateYearSection_Button()
      {
            StartCoroutine(Deactivation());
      }

      IEnumerator Deactivation()
      {            
            WWWForm form = new WWWForm();
            form.AddField("id", "a");

            using (UnityWebRequest yearSectionData = UnityWebRequest.Post(delete,form))
            {
                  yield return yearSectionData.SendWebRequest();
                  TextMeshProUGUI a = GetComponentInChildren<TextMeshProUGUI>();
                  Debug.Log(a.text);
            }
      }

}