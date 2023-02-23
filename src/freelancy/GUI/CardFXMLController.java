/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package freelancy.GUI;

import freelancy.entite.card;
import freelancy.service.card_service;
import java.io.IOException;
import java.net.URL;
import java.util.ResourceBundle;
import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.fxml.Initializable;
import javafx.scene.Scene;
import javafx.scene.control.Alert;
import javafx.scene.control.ButtonType;
import javafx.scene.control.TextField;
import javafx.scene.layout.AnchorPane;
import javafx.stage.Stage;

/**
 * FXML Controller class
 *
 * @author Ghass
 */
public class CardFXMLController implements Initializable {

    @FXML
    private TextField cnom;
    @FXML
    private TextField cprenom;
    @FXML
    private TextField cdate;
    @FXML
    private TextField ccvc;
    @FXML
    private TextField czip;
    @FXML
    private TextField cville;
    @FXML
    private TextField cnum;

    /**
     * Initializes the controller class.
     */
    @Override
    public void initialize(URL url, ResourceBundle rb) {
        // TODO
    }    

    @FXML
    private void ajout(ActionEvent event) {
         if (cnom.getText().isEmpty() || cprenom.getText().isEmpty() || cdate.getText().isEmpty() || ccvc.getText().isEmpty() || czip.getText().isEmpty() || cville.getText().isEmpty())
        {
            Alert a = new Alert(Alert.AlertType.ERROR, "données invalide(s)", ButtonType.OK);
            a.showAndWait();     
        }
        else {
            
             card r1 = new card(cnom.getText(),cprenom.getText(),cdate.getText(),Integer.parseInt(ccvc.getText()) ,Integer.parseInt(czip.getText()),cville.getText(),Long.parseLong(cnum.getText()));
             card_service s= new card_service();
             s.ajouter(r1);
             Alert a = new Alert(Alert.AlertType.INFORMATION, "Ajout effectué", ButtonType.OK);
            a.showAndWait();   
        }
    }

    @FXML
    private void affich(ActionEvent event) throws IOException {
        FXMLLoader fxmlLoader = new FXMLLoader();
         fxmlLoader.setLocation(getClass().getResource("card_afficherFXML.fxml"));
          AnchorPane anchorPane;
          anchorPane = fxmlLoader.load();
          Stage stage = new Stage();
        stage.setScene(new Scene(anchorPane));
        stage.show();
    }
    
}
