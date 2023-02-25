/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package GUI;

import entities.Admin;
import java.net.URL;
import java.util.ResourceBundle;
import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.Initializable;
import javafx.scene.control.Button;
import javafx.scene.control.TextField;
import sevices.ServiceUser;

/**
 * FXML Controller class
 *
 * @author Firas
 */
public class AddAdminUIController implements Initializable {

    @FXML
    private TextField TF_NOM;
    @FXML
    private Button AddUser;
    @FXML
    private TextField TF_Email;
    @FXML
    private TextField TF_Password;
    @FXML
    private Button button_anuuler;

    /**
     * Initializes the controller class.
     */
    @Override
    public void initialize(URL url, ResourceBundle rb) {
        // TODO
    }    

    @FXML
    private void On_AddUser_clicked(ActionEvent event) {
        ServiceUser sa = new ServiceUser();
        Admin a = new Admin() ; 
       
        
        a.setName( TF_NOM.getText());
        a.setEmail( TF_Email.getText());
        a.setPassword( TF_Password.getText());
        
        sa.ajouter(a);
        
        
       
    }

    @FXML
    private void On_anuuler_clicked(ActionEvent event) {
    }
    
}
