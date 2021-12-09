using UnityEngine;

using UnityEngine.UI;
using System;
using UnityEngine.Networking;
using TMPro;

public class db_checker : MonoBehaviour
{
      [Header("Connection Requirements")]
      // at first or when sql is down a filter will come up and check this requirements
      [SerializeField] private TMP_InputField data_source;
      [SerializeField] private TMP_InputField user_id;
      [SerializeField] private TMP_InputField initial_catalogue;
      [SerializeField] private TMP_InputField password;

      [Header("Asset to use")]
      [SerializeField] private GameObject panel;
      [SerializeField] private TMP_Text warning;
      
      public void Awake()
      {
            WWW www = new WWW("http://localhost/");
      }
}