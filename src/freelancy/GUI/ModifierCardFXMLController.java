/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package freelancy.GUI;

import freelancy.entite.card;
import freelancy.service.card_service;
import freelancy.utils.DataSource;
import java.io.IOException;
import java.net.URL;
import java.util.ResourceBundle;
import java.util.logging.Level;
import java.util.logging.Logger;
import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.fxml.Initializable;
import javafx.scene.Node;
import javafx.scene.Parent;
import javafx.scene.Scene;
import javafx.scene.control.TextField;
import javafx.stage.Stage;

/**
 * FXML Controller class
 *
 * @author Ghass
 */
public class ModifierCardFXMLController implements Initializable {

    @FXML
    private TextField modifnom;
    @FXML
    private TextField modifprenom;
    @FXML
    private TextField modifdate;
    @FXML
    private TextField modif;
    @FXML
    private TextField modifcvc;
    @FXML
    private TextField modifville;
    @FXML
    private TextField modifnum;
    
    card C;
   
    /**
     * Initializes the controller class.
     */
    @Override
    public void initialize(URL url, ResourceBundle rb) {
        // TODO
    }    
    void getCard(card u){
        
        modifnom.setText(u.getNom());
        modifprenom.setText(u.getPrenom());
        
        modifdate.setText(u.getDate());
        modif.setText(Integer.toHexString(u.getCvc()));
        modifcvc.setText(Integer.toHexString(u.getZipcode()));
        modifville.setText(u.getVille());
        modifnum.setText(Long.toHexString(u.getNum()));
        C =  (u);
        
        
    }

    @FXML
    private void modif(ActionEvent event) {
         try {
            C.setNom(modifnom.getText());
            C.setPrenom(modifprenom.getText());
            C.setDate(modifdate.getText());
            C.setCvc(Integer.parseInt(modif.getText()));
            C.setSipcode(Integer.parseInt(modifcvc.getText()));
            C.setVille(modifville.getText());
            C.setNum(Long.parseLong(modifnum.getText()));
            
            card_service ss = new card_service();
            
            
            ss.modifier(C);
        FXMLLoader loader= new FXMLLoader(getClass().getResource("cardFXML.fxml"));
            Parent view_2=loader.load();
            Scene scene = new Scene(view_2);
            Stage stage=(Stage)((Node)event.getSource()).getScene().getWindow();
            stage.setScene(scene);
            stage.show();
        } catch (IOException ex) {
            Logger.getLogger(ModifierCardFXMLController.class.getName()).log(Level.SEVERE, null, ex);
        }
        
    }
    
}
