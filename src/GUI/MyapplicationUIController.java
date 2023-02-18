/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package GUI;

import entities.SessionManager;
import entities.Utilisateur;
import java.net.URL;
import java.util.ResourceBundle;
import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.Initializable;
import javafx.scene.control.Button;
import javafx.scene.control.Label;
import javafx.scene.input.KeyEvent;

/**
 * FXML Controller class
 *
 * @author Firas
 */
public class MyapplicationUIController implements Initializable {

    @FXML
    private Label label_userid;
    @FXML
    private Button a;

    /**
     * Initializes the controller class.
     */
    @Override
    public void initialize(URL url, ResourceBundle rb) {
        // TODO
    }    

    private void on_keypressed_label(KeyEvent event) {
       label_userid.setText(String.valueOf(SessionManager.getInstance().getCurrentUser().getId()));
    }

    @FXML
    private void test(ActionEvent event) {
        label_userid.setText(String.valueOf(SessionManager.getInstance().getCurrentUser().getId()));
    }
    
}
