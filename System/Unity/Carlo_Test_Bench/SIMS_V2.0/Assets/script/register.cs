using System.Collections;
using System.Collections.Generic;
using UnityEngine;

using UnityEngine.UI;
using TMPro;

public class register : MonoBehaviour
{
    [Header("Register Sub-Admin - Inputs")]
    [SerializeField] private TMP_InputField usernameInput;
    [SerializeField] private TMP_InputField passwordInput;

    [Header("Register Sub-Admin - Signs")]
    [SerializeField] private GameObject nameAlreadyExistWarningContainer;
    [SerializeField] private GameObject queryFailedWarningTextContainer;
    [SerializeField] private GameObject querySuccessWarningTextContainer;
    [SerializeField] private GameObject codeErrorWarningTextContainer;
    
    [Header("Register Sub-Admin - Button")]
    [SerializeField] private Button submitButton; 

    [Header("Admin - Panel")]
    [SerializeField] private GameObject adminPanel; 

    private int minUsername=8, minPassword=16;
    
    public void RegisterStroke()
    {
        StartCoroutine(Register());
    }

    IEnumerator Register()
    {
        WWWForm form = new WWWForm();
        form.AddField("username", usernameInput.text);
        form.AddField("password", passwordInput.text);
        form.AddField("admin", 1 ); // this should be a checkbox
        WWW registration = new WWW("http://localhost/PHP-Codes/BSCS-3-Profiling-System/System/CS-SIMS/php-home/register.php", form);
        yield return registration;
        switch (registration.text)
        {
            case "0":
                querySuccessWarningTextContainer.SetActive(true);
                yield return new WaitForSeconds(3);
                querySuccessWarningTextContainer.SetActive(false);
                break;
            case "1":
                nameAlreadyExistWarningContainer.SetActive(true);
                yield return new WaitForSeconds(3);
                nameAlreadyExistWarningContainer.SetActive(false);
                break;
            case "2":
                queryFailedWarningTextContainer.SetActive(true);
                yield return new WaitForSeconds(3);
                queryFailedWarningTextContainer.SetActive(false);
                break;
            default:
                codeErrorWarningTextContainer.SetActive(true);
                yield return new WaitForSeconds(3);
                codeErrorWarningTextContainer.SetActive(false); 
                break;
            
        }
    }

    public void VerifyInputs()
    {
        submitButton.interactable = (usernameInput.text.Length >= minUsername && passwordInput.text.Length >= minPassword);
    }

}
