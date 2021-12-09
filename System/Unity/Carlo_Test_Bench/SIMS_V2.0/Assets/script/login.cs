using System.Collections;
using System.Collections.Generic;
using UnityEngine;

using TMPro;
using UnityEngine.UI;

public class login : MonoBehaviour
{
    [Header("Login - Inputs")]
    [SerializeField] private TMP_InputField usernameInput;
    [SerializeField] private TMP_InputField passwordInput;

    [Header("Login - Signs")]
    [SerializeField] private TextMeshProUGUI userNotRegisteredTextContainer;
    [SerializeField] private TextMeshProUGUI passwordIncorrectTextContainer;
    [SerializeField] private TextMeshProUGUI codeErrorWarningTextContainer;

    [Header("Admin/Sub-Admin - Panel")]
    [SerializeField] private GameObject thisPanel; 
    [SerializeField] private GameObject adminPanel; 
    [SerializeField] private GameObject subAdminPanel;

    [Header("Login - Button")]
    [SerializeField] private Button submitButton;

    private int minUsername=8, minPassword=8;

    public void Calllogin()
    {
        StartCoroutine(Login());
    }

    IEnumerator Login()
    {
        WWWForm form = new WWWForm();
        form.AddField("username", usernameInput.text);
        form.AddField("password", passwordInput.text);
        WWW login = new WWW("http://localhost/PHP-Codes/BSCS-3-Profiling-System/System/CS-SIMS/php-home/login.php", form);
        yield return login;
        string[] loginResult = login.text.Split('\t');

        switch (loginResult[0])
        {
            case "0":
                DBManager.username = usernameInput.text;
                break;
            case "1":
                userNotRegisteredTextContainer.enabled = true;
                yield return new WaitForSeconds(3);
                userNotRegisteredTextContainer.enabled = false;
                break;
            case "2":
                passwordIncorrectTextContainer.enabled = true;
                yield return new WaitForSeconds(3);
                passwordIncorrectTextContainer.enabled = false;
                break;
            default:
                codeErrorWarningTextContainer.enabled = true;
                yield return new WaitForSeconds(3);
                codeErrorWarningTextContainer.enabled = false; 
                break;
        }
        
        if (int.Parse(loginResult[1]) == 1)
        {
            thisPanel.SetActive(false);
            adminPanel.SetActive(true);
        }
        else
        {
            thisPanel.SetActive(false);
            subAdminPanel.SetActive(true);
        }
        
    }

    public void VerifyInputs()
    {
        submitButton.interactable = (usernameInput.text.Length >= minUsername && passwordInput.text.Length >= minPassword);
    }

}
