/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package GUI;

import entities.Offre;
import java.net.URL;
import java.util.ResourceBundle;
import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.Initializable;
import javafx.scene.control.TextArea;
import javafx.scene.control.TextField;
import services.ServiceOffre;

/**
 * FXML Controller class
 *
 * @author Firas
 */
public class OffrePageController implements Initializable {

    @FXML
    private TextArea tfDesc;
    @FXML
    private TextField tfTitre;
    @FXML
    private TextField tfDomaine;
    @FXML
    private TextField tfType;
    @FXML
    private TextField tfDuree;

    /**
     * Initializes the controller class.
     */
    @Override
    public void initialize(URL url, ResourceBundle rb) {
        // TODO
        ServiceOffre so = new ServiceOffre();
        Offre o = so.getOneById(AffichageOffreController.id_offre);
        tfTitre.setText(o.getTitle());
        tfDesc.setText(o.getDescription());
       tfDesc.setWrapText(true); // Activate line wrapping
        tfDesc.setEditable(false); // Set the text area to read-only
        tfDomaine.setText(o.getCategory());
        tfType.setText(o.getType());
        tfDuree.setText(o.getDuree()+"");
    }    

    @FXML
    private void btnPostulerAction(ActionEvent event) {
    }
    
}
