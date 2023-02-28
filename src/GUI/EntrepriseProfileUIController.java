/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package GUI;

import entities.Entreprise;
import entities.Freelancer;
import entities.SessionManager;
import java.io.File;
import java.io.IOException;
import java.net.URL;
import java.util.ResourceBundle;
import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.fxml.Initializable;
import javafx.scene.Node;
import javafx.scene.Parent;
import javafx.scene.Scene;
import javafx.scene.control.Button;
import javafx.scene.control.Label;
import javafx.scene.image.Image;
import javafx.scene.image.ImageView;
import javafx.stage.Stage;
import sevices.ServiceUser;

/**
 * FXML Controller class
 *
 * @author Firas
 */
public class EntrepriseProfileUIController implements Initializable {

    @FXML
    private Label label_info;
    @FXML
    private Label label_adresse;
    @FXML
    private Label label_domaine;
    @FXML
    private Label label_nbe;
    @FXML
    private ImageView ImageViewEnt;
    @FXML
    private Label label_nom;
    @FXML
    private Button btnDeconnecter;

    /**
     * Initializes the controller class.
     */
    @Override
    public void initialize(URL url, ResourceBundle rb) {
        // TODO
         ServiceUser sa = new  ServiceUser();
        Entreprise f = (Entreprise)sa.getOneById(SessionManager.getInstance().getCurrentUser().getId());
        label_nom.setText("Bonjour si " + f.getName());
        label_info.setText(f.getInfo());
        label_adresse.setText(f.getLocation());
        label_domaine.setText(f.getDomaine());
        Integer a = f.getNumberOfEmployees(); 
        label_nbe.setText(a.toString());
        if (f.getImagePath() != null)
        {
        File imagef = new File(f.getImagePath());
            
          
        Image image = new Image(imagef.toURI().toString());
        ImageViewEnt.setImage(image);
        }
    }    

    @FXML
    private void btnDeconnecterAction(ActionEvent event) {
        SessionManager.getInstance().setCurrentUser(null);
         try {

            Parent page1 = FXMLLoader.load(getClass().getResource("/GUI/LoginUI.fxml"));

            Scene scene = new Scene(page1);

            Stage stage = (Stage) ((Node) event.getSource()).getScene().getWindow();

            stage.setScene(scene);

            stage.show();

        } catch (IOException ex) {

           System.out.println(ex.getMessage());

        }
    }
    
}
