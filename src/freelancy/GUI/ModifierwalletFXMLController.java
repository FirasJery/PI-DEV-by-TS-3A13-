/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package freelancy.GUI;
import freelancy.entite.wallet;
import freelancy.service.card_service;
import freelancy.service.wallet_service;
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
public class ModifierwalletFXMLController implements Initializable {

    @FXML
    private TextField modifc;
    
    wallet w;

    /**
     * Initializes the controller class.
     */
    @Override
    public void initialize(URL url, ResourceBundle rb) {
        // TODO
    }    
    void getWallet(wallet u){
        
        modifc.setText(Long.toHexString(u.getNum_carte()));
        
        w =  (u);
        
        
    }

    @FXML
    private void modifier(ActionEvent event) {
         try {
            w.setNum_carte(Long.parseLong(modifc.getText()));
            
            
            wallet_service ss = new wallet_service();
            
            
            ss.modifier(w);
        FXMLLoader loader= new FXMLLoader(getClass().getResource("walletFXML.fxml"));
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
