/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package Scene;

import Entities.Personne;
import Services.ServicePersonne;
import java.net.URL;
import java.sql.SQLException;
import java.util.ResourceBundle;
import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.Initializable;
import javafx.scene.control.Alert;
import javafx.scene.control.Alert.AlertType;
import javafx.scene.control.ButtonType;
import javafx.scene.control.TextField;

/**
 * FXML Controller class
 *
 * @author ASUS
 */
public class fxcTest implements Initializable {

    @FXML
    private TextField tfNom;
    @FXML
    private TextField tfPrenom;

    /**
     * Initializes the controller class.
     */
    @Override
    public void initialize(URL url, ResourceBundle rb) {
        // TODO
    }    

    @FXML
    private void ajouterTest(ActionEvent event) {
        try{
            Personne p = new Personne(0, tfNom.getText(), tfPrenom.getText());
            ServicePersonne sp = new ServicePersonne();
            sp.create(p);
            Alert alert = new Alert(AlertType.INFORMATION, "Notification", ButtonType.CLOSE);
            alert.setHeaderText(null);
            alert.setContentText("Personne insérée avec succés!");
            alert.show();
        }
        catch(SQLException ex){
            Alert alert = new Alert(AlertType.ERROR, "Notification", ButtonType.CLOSE);
            alert.setHeaderText(null);
            alert.setContentText("Opération échoué!");
            alert.show();
        }

    }
    
}
