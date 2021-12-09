using UnityEngine;
using UnityEngine.Networking;
using System.Collections;
using System.Collections.Generic;
using UnityEngine.UI;
using System;
using TMPro;

public class year_section : MonoBehaviour
{
      [Header("Web Connection")]
      [SerializeField] private string read = "http://localhost/PHP-Codes/BSCS-3-Profiling-System/System/CS-SIMS/php-home/YearSectionRead.php";

      [Header("Year Section Template")]
      [SerializeField] private GameObject yearSectionTemplate;

      void Start()
      {
            
      }

      public void OpenYearSection_Card() {
            StartCoroutine(YearSection());
      }

      IEnumerator YearSection()
      {
            using (UnityWebRequest yearSectionData = UnityWebRequest.Get(read))
            {
                  yield return yearSectionData.SendWebRequest();

                  string[] ysSplit = yearSectionData.downloadHandler.text.Split('\t');

                  string[] ysResult = read.Split('/');
                  int _ys = ysResult.Length - 1;
                  
                  GameObject ysTemplate = yearSectionTemplate.transform.GetChild(0).gameObject;
                  GameObject g;

                  switch (yearSectionData.result)
                  {
                        case UnityWebRequest.Result.ConnectionError:
                        case UnityWebRequest.Result.DataProcessingError:
                              Debug.LogError(ysResult[_ys] + ": Error: " + yearSectionData.error);
                              break;
                        case UnityWebRequest.Result.ProtocolError:
                              Debug.LogError(ysResult[_ys] + ": HTTP Error: " + yearSectionData.error);
                              break;
                        case UnityWebRequest.Result.Success:
                              switch (yearSectionData.downloadHandler.text)
                              {
                                    case "Table is Empty":
                                          Debug.Log("Table is Empty");
                                          break;
                                    case "1":
                                          Debug.Log("Error");
                                          break;
                                    default:
                                          for (int i=1; i <= int.Parse(yearSectionData.downloadHandler.text[0]+"")*3; i += 3)
                                          {
                                                int b = i + 1;
                                                int c = b + 1;
 
                                                string yearandsection = "BS in Computer Science " + ysSplit[b] + " - " + ysSplit[c];

                                                g = Instantiate (ysTemplate, yearSectionTemplate.transform);
                                                g.transform.GetChild(0).GetComponent<TextMeshProUGUI>().text = yearandsection;
                                                g.transform.GetChild(1).GetChild(0).GetComponent<TextMeshProUGUI>().text = ysSplit[i] + "";

                                                g.GetComponent<Button>().onClick.AddListener(delegate(){
                                                      ItemClicked(i);
                                                });
                                          }

                                          Destroy (ysTemplate);

                                          break;

                              }
                              break;
                  }
            }
      }

      void ItemClicked (int itemIndex)
      {
            Debug.Log("item " + itemIndex + " clicked");
      }
}