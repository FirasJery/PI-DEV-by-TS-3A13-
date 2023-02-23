/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package GUI;

import java.net.URL;
import java.util.ResourceBundle;
import javafx.fxml.Initializable;

import javafx.fxml.FXML;
import javafx.scene.control.Button;
import javafx.scene.control.TextArea;
import javafx.scene.control.TextField;

/**
 * FXML Controller class
 *
 * @author ASUS
 */
public class AjouteroffreController implements Initializable {

    @FXML
    private TextField txtTitre;

    @FXML
    private TextField txtDuree;

    @FXML
    private Button btnAjouter;

    @FXML
    private Button btnModifier;

    @FXML
    private Button btnSupprimer;

    @FXML
    private Button btnPostuler;

    @FXML
    private TextArea txtDescription;

    @FXML
    private TextField txtCategorie;

    @FXML
    private TextField txtType;

   
 @Override
    public void initialize(URL url, ResourceBundle rb) {
        // TODO
    }    
}


