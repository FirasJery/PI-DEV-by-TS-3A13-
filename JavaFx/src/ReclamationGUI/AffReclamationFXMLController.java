/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package ReclamationGUI;

import entities.SessionManager;
import java.awt.Color;
import java.io.IOException;
import java.net.URL;
import java.util.ResourceBundle;
import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.fxml.Initializable;
import javafx.scene.Cursor;
import javafx.scene.control.Button;
import javafx.scene.layout.Pane;
import javafx.scene.paint.Paint;

/**
 * FXML Controller class
 *
 * @author Ghass
 */
public class AffReclamationFXMLController implements Initializable {

    @FXML
    private Pane affpane;
    SessionManager sessionManager = SessionManager.getInstance();
    String offre_path = "";
    @FXML
    private Button Suivie;
    @FXML
    private Button btnajouterRec;


    /**
     * Initializes the controller class.
     */
    @Override
    public void initialize(URL url, ResourceBundle rb) {
        Suivie.setCursor(Cursor.HAND);
                btnajouterRec.setCursor(Cursor.HAND);

        
        // TODO
    }    

    @FXML
    private void ajj(ActionEvent event) {
        affpane.getChildren().clear();
        FXMLLoader loadOffre = new FXMLLoader(getClass().getResource("AddRec.fxml"));
        
        try {
           
            affpane.getChildren().add(loadOffre.load());
        } catch (IOException ex) {
            ex.getMessage();
        }
        
    }

    @FXML
    private void suiv(ActionEvent event) {
        affpane.getChildren().clear();
        FXMLLoader loadOffre = new FXMLLoader(getClass().getResource("SuivieRec.fxml"));
        
        try {
           
            affpane.getChildren().add(loadOffre.load());
        } catch (IOException ex) {
            ex.getMessage();
        }
    }

    
    
}
