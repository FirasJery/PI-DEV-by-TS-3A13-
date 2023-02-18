/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package GUI;

import entities.Admin;
import entities.Freelancer;
import java.net.URL;
import java.util.HashSet;
import java.util.ResourceBundle;
import java.util.Set;
import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.Initializable;
import javafx.scene.control.Button;
import javafx.scene.control.TextField;
import sevices.ServiceUser;

/**
 * FXML Controller class
 *
 * @author Firas
 */
public class AddFreelancerController implements Initializable {

    @FXML
    private TextField TF_nom;
    @FXML
    private TextField TF_email;
    @FXML
    private TextField TF_mdp;
    @FXML
    private TextField TF_bio;
    @FXML
    private TextField Tf_experience;
    @FXML
    private TextField TF_education;
    @FXML
    private Button Button_inscrire;
    @FXML
    private Button button_annuler;

    /**
     * Initializes the controller class.
     */
    @Override
    public void initialize(URL url, ResourceBundle rb) {
        // TODO
    }    

    @FXML
    private void ON_inscrire_clicked(ActionEvent event) {
        ServiceUser sa = new ServiceUser();
        Freelancer f = new Freelancer() ; 
       
        
        f.setName( TF_nom.getText());
        f.setEmail( TF_email.getText());
        f.setPassword( TF_mdp.getText());
        f.setBio(TF_bio.getText());
        f.setEducation(TF_education.getText());
        f.setExperience(Tf_experience.getText());
        f.setTotal_jobs(0);
        
        
        sa.ajouter(f);
    }

    @FXML
    private void on_annuler_clicked(ActionEvent event) {
        TF_bio.setText("");
        TF_education.setText("");
        Tf_experience.setText("");
        TF_mdp.setText("");
        TF_nom.setText("");
        TF_email.setText("");
        
    }
    
}
