/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package GUI;

import entities.Entreprise;
import entities.Offre;
import java.net.URL;
import java.util.ResourceBundle;
import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.Initializable;
import javafx.scene.control.Button;
import javafx.scene.control.TextField;
import services.ServiceOffre;

/**
 * FXML Controller class
 *
 * @author ASUS
 */
public class AjoutOffreController implements Initializable {

    @FXML
    private TextField txtTitre;
    @FXML
    private TextField txtDescription;
    @FXML
    private TextField txtCategorie;
    @FXML
    private TextField txtType;
    @FXML
    private TextField txtDuree;
    @FXML
    private Button btnAjouter;

    /**
     * Initializes the controller class.
     */
    @Override
    public void initialize(URL url, ResourceBundle rb) {
        // TODO
    }    

    @FXML
    private void Ajouter(ActionEvent event) {
        ServiceOffre os = new ServiceOffre();
       Offre o = new Offre();
       Entreprise e = new Entreprise(); // a changer par l'entreprise connectée , sessionManager 
       e.setId(30);
        
        o.setTitle( txtTitre.getText());
        o.setDescription( txtDescription.getText());
        o.setCategory( txtCategorie.getText());
        o.setType(txtType.getText());
        o.setDuree(Integer.parseInt(txtDuree.getText()));
        o.setE(e);
        
        
        os.ajouter(o);
    }
    
}
