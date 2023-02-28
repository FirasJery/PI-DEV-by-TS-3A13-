/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package GUI;

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
public class FreelancerProfileUIController implements Initializable {

    @FXML
    private Label Label_MsgA;
    @FXML
    private ImageView ImageProfile;
    @FXML
    private Label label_email; 
    @FXML
    private Label label_bio;
    @FXML
    private Label label_education;
    @FXML
    private Label label_experience;
    @FXML
    private Button btnDeconnecter;
    @FXML
    private Button btnModif;

    /**
     * Initializes the controller class.
     */
    @Override
    public void initialize(URL url, ResourceBundle rb) {

        // TODO
        ServiceUser sa = new  ServiceUser();
        Freelancer f = (Freelancer)sa.getOneById(SessionManager.getInstance().getCurrentUser().getId());
        Label_MsgA.setText("Bonjour si " + f.getName());
        label_email.setText(f.getEmail());
        label_bio.setText(f.getBio());
        label_education.setText(f.getEducation());
        label_experience.setText(f.getExperience());
        if (f.getImagePath() != null)
        {
        File imagef = new File(f.getImagePath());
        Image image = new Image(imagef.toURI().toString());
        ImageProfile.setImage(image);
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

    @FXML
    private void btnModifAction(ActionEvent event) {
        try {

            Parent page1 = FXMLLoader.load(getClass().getResource("/GUI/ModifierProfilFreelancer.fxml"));

            Scene scene = new Scene(page1);

            Stage stage = (Stage) ((Node) event.getSource()).getScene().getWindow();

            stage.setScene(scene);

            stage.show();

        } catch (IOException ex) {

           System.out.println(ex.getMessage());

        }
    }


}
