/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package freelancy.gui;

import freelancy.entities.Test;
import freelancy.services.ServiceTest;
import java.io.IOException;
import java.net.URL;
import java.sql.SQLException;
import java.util.ResourceBundle;
import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.fxml.Initializable;
import javafx.scene.Node;
import javafx.scene.Parent;
import javafx.scene.Scene;
import javafx.scene.control.Alert;
import javafx.scene.control.Button;
import javafx.scene.control.ButtonType;
import javafx.scene.control.TextArea;
import javafx.scene.control.TextField;
import javafx.stage.Stage;

/**
 * FXML Controller class
 *
 * @author hichem
 */
public class AjoutTestUIController implements Initializable {

    @FXML
    private TextField TF_nom;
    @FXML
    private TextArea TA_desc;
    @FXML
    private Button b_ajout;
    private Test testt;

    /**
     * Initializes the controller class.
     */
    @Override
    public void initialize(URL url, ResourceBundle rb) {
        // TODO
    }    
    public void setData(Test tes) {
        testt=tes;
    TF_nom.setText(tes.getNom());
    TA_desc.setText(tes.getDescription());
    }

    @FXML
    private void ON_boutoun_ajouter_action(ActionEvent event) throws IOException  {
        /*if (TF_nom.getText().isEmpty() || TA_desc.getText().isEmpty()) {
            Alert a = new Alert(Alert.AlertType.ERROR, "Nom ou description invalide(s)", ButtonType.OK);
            a.showAndWait();
        }else {
            try {
                ServiceTest st = new ServiceTest();
                Test p = new Test(TF_nom.getText(), TA_desc.getText());
                st.ajouter(p);
                Alert a = new Alert(Alert.AlertType.INFORMATION, "Personne added !", ButtonType.OK);
                a.showAndWait();
                
                FXMLLoader loader = new FXMLLoader(getClass().getResource("AfficherPersonne.fxml"));
                Parent root = loader.load();
                TF_nom.getScene().setRoot(root);
                
                /*AfficherPersonneController apc = loader.getController();
                apc.setNom(tfNom.getText());
                apc.setPrenom(tfPrenom.getText());
                
            } catch (SQLException ex) {
                Alert a = new Alert(Alert.AlertType.ERROR, ex.getMessage(), ButtonType.OK);
                a.showAndWait();
            }
        }*/
        String nom = TF_nom.getText();
        String desc = TA_desc.getText();
        
        ServiceTest st = new ServiceTest();
        Test t = new Test();
        t.setNom(nom);
        t.setDescription(desc);
        st.ajouter(t);
        Parent page1 = FXMLLoader.load(getClass().getResource("/freelancy/gui/AjouterQuestion.fxml"));

            Scene scene = new Scene(page1);

            Stage stage = (Stage) ((Node) event.getSource()).getScene().getWindow();

            stage.setScene(scene);

            stage.show();
        
    }
    
    
}
