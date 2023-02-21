/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package GUI;

import entities.Freelancer;
import entities.SessionManager;
import java.io.File;
import java.net.URL;
import java.util.ResourceBundle;
import javafx.fxml.FXML;
import javafx.fxml.Initializable;
import javafx.scene.control.Label;
import javafx.scene.image.Image;
import javafx.scene.image.ImageView;
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

    /**
     * Initializes the controller class.
     */
    @Override
    public void initialize(URL url, ResourceBundle rb) {

        // TODO
        ServiceUser sa = new  ServiceUser();
        Freelancer f = (Freelancer)sa.getOneById(SessionManager.getInstance().getCurrentUser().getId());
        Label_MsgA.setText("Bonjour Si" + f.getName());
        label_email.setText(f.getEmail());
        label_bio.setText(f.getBio());
        label_education.setText(f.getEducation());
        label_experience.setText(f.getExperience());

        File imagef = new File(f.getImagePath());
        Image image = new Image(imagef.toURI().toString());
        ImageProfile.setImage(image);

    }


}
