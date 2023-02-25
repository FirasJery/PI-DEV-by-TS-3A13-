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
import javafx.scene.control.Alert;
import javafx.scene.control.Button;
import javafx.scene.control.TextField;
import javafx.scene.input.MouseDragEvent;
import javafx.scene.input.MouseEvent;
import services.ServiceUser;
import GUI.ControleSaisieTextFields;
import java.io.File;
import java.io.IOException;
import javafx.fxml.FXMLLoader;
import javafx.scene.Node;
import javafx.scene.Parent;
import javafx.scene.Scene;
import javafx.scene.control.Label;
import javafx.scene.image.Image;
import javafx.scene.image.ImageView;
import javafx.scene.input.DragEvent;
import javafx.stage.FileChooser;
import javafx.stage.Stage;

/**
 * FXML Controller class
 *
 * @author Firas
 */
public class AddFreelancerController implements Initializable {

    private ControleSaisieTextFields cs = new ControleSaisieTextFields();

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

    private String ImagePath;

    @FXML
    private Button Add_image_button;
    @FXML
    private Label imageLabel;
    @FXML
    private Label labelNomError;

    @FXML
    private Label labelMdpError;
    @FXML
    private Label labelBioError;
    @FXML
    private Label labelExpError;
    @FXML
    private Label labelEduError;
    @FXML
    private ImageView ImagePreviw;
    @FXML
    private Label labelEmailError;
    @FXML
    private Button btnRetour;

    /**
     * Initializes the controller class.
     */
    @Override
    public void initialize(URL url, ResourceBundle rb) {

        // TODO 
        ImagePath = "C:/Users/Firas/Desktop/profile.jpg";
        TF_nom.focusedProperty().addListener((observable, oldValue, newValue) -> {
            if (!newValue) {
                String text = TF_nom.getText();
                if (!cs.checkOnlyString(text)) {
                    labelNomError.setText("nom n'est pas valide ! ");
                } else {
                    labelNomError.setText("");
                }
            }
        });

        TF_email.focusedProperty().addListener((observable, oldValue, newValue) -> {
            if (!newValue) {
                String text = TF_email.getText();
                if (!cs.isEmailAdress(text)) {
                    labelEmailError.setText("Email n'est pas valide ! ");
                } else {
                    labelEmailError.setText("");
                }
            }
        });
        TF_mdp.focusedProperty().addListener((observable, oldValue, newValue) -> {
            if (!newValue) {
                String text = TF_mdp.getText();
                if (text.length() <= 8) {
                    labelMdpError.setText("mot de pasee trop court  ! ");
                } else {
                    labelMdpError.setText("");
                }
            }
        });
        TF_bio.focusedProperty().addListener((observable, oldValue, newValue) -> {
            if (!newValue) {
                String text = TF_bio.getText();
                if (!cs.checkOnlyString(text)) {
                    labelBioError.setText("bio ne doit pas commencer par un chiffre! ");
                } else {
                    labelBioError.setText("");
                }
            }
        });
        TF_education.focusedProperty().addListener((observable, oldValue, newValue) -> {
            if (!newValue) {
                String text = TF_education.getText();
                if (!cs.checkOnlyString(text)) {
                    labelEduError.setText("Education ne doit pas commencer par un chiffre! ");

                } else {
                    labelEduError.setText("");
                }
            }
        });
        Tf_experience.focusedProperty().addListener((observable, oldValue, newValue) -> {
            if (!newValue) {
                String text = Tf_experience.getText();
                if (!cs.checkOnlyString(text)) {
                    labelExpError.setText("Experience ne doit pas commencer par un chiffre! ");

                } else {
                    labelExpError.setText("");
                }

            }
        });

    }

    @FXML
    private void ON_inscrire_clicked(ActionEvent event) throws IOException {
        ServiceUser sa = new ServiceUser();
        Freelancer f = new Freelancer();

        if (cs.isEmpty(TF_nom.getText()) || cs.isEmpty(TF_email.getText()) || cs.isEmpty(TF_mdp.getText()) || cs.isEmpty(TF_bio.getText()) || cs.isEmpty(TF_education.getText()) || cs.isEmpty(Tf_experience.getText())) {
            Alert A = new Alert(Alert.AlertType.ERROR);
            A.setContentText("Veuillez remplir tout les champs ! ");
            A.showAndWait();
        } else if (!cs.checkOnlyString(TF_nom.getText())) {
            Alert A = new Alert(Alert.AlertType.ERROR);
            A.setContentText("nom n'est pas valide !  ");
            A.showAndWait();

        } else if (!cs.isEmailAdress(TF_email.getText())) {
            Alert A = new Alert(Alert.AlertType.ERROR);
            A.setContentText("Email n'est pas valide ! ");
            A.showAndWait();

        } else if (TF_mdp.getText().length() <= 8) {

            Alert A = new Alert(Alert.AlertType.ERROR);
            A.setContentText("mot de pasee trop court  ! ");
            A.showAndWait();
        } else if (!cs.checkOnlyString(TF_education.getText())) {
            Alert A = new Alert(Alert.AlertType.ERROR);
            A.setContentText("Education n'est pas valide !  ");
            A.showAndWait();

        } else if (!cs.checkOnlyString(Tf_experience.getText())) {
            Alert A = new Alert(Alert.AlertType.ERROR);
            A.setContentText("Experience n'est pas valide !  ");
            A.showAndWait();

        } else if (!cs.checkOnlyString(TF_bio.getText())) {
            Alert A = new Alert(Alert.AlertType.ERROR);
            A.setContentText("Bio n'est pas valide !  ");
            A.showAndWait();

        } else if (sa.ChercherMail(TF_email.getText()) == 1) {
            Alert A = new Alert(Alert.AlertType.ERROR);
            A.setContentText("L'adresse mail est deja utilisée !  ");
            A.showAndWait();
        } else {
            f.setName(TF_nom.getText());
            f.setEmail(TF_email.getText());
            f.setPassword(TF_mdp.getText());
            f.setBio(TF_bio.getText());
            f.setEducation(TF_education.getText());
            f.setExperience(Tf_experience.getText());
            f.setTotal_jobs(0);
            f.setImagePath(ImagePath);
            sa.ajouter(f);

            ///////////////////////////////////////////////// switch
            Parent page1 = FXMLLoader.load(getClass().getResource("/GUI/LoginUI.fxml"));

            Scene scene = new Scene(page1);

            Stage stage = (Stage) ((Node) event.getSource()).getScene().getWindow();

            stage.setScene(scene);

            stage.show();

        }
    }

    @FXML
    private void on_annuler_clicked(ActionEvent event) {
        TF_bio.clear();
        TF_education.clear();
        Tf_experience.clear();
        TF_mdp.clear();
        TF_nom.clear();
        TF_email.clear();
        ImagePath = "";

    }

    @FXML

    private void add_image_action(ActionEvent event) {
        FileChooser fc = new FileChooser();
        File SelectedFile = fc.showOpenDialog(null);
        if (SelectedFile != null) {
            imageLabel.setText(SelectedFile.getName());
            ImagePath = SelectedFile.getAbsolutePath();
            ImagePreviw.setImage(new Image(new File(ImagePath).toURI().toString()));
        } else {

            ImagePath = "C:/Users/Firas/Desktop/profile.jpg";
            imageLabel.setText("C:/Users/Firas/Desktop/profile.jpg");
            ImagePreviw.setImage(new Image(new File(ImagePath).toURI().toString()));
        }

    }

    @FXML
    private void btnRetourAction(ActionEvent event) throws IOException {
        Parent page1 = FXMLLoader.load(getClass().getResource("/GUI/LoginUI.fxml"));

            Scene scene = new Scene(page1);

            Stage stage = (Stage) ((Node) event.getSource()).getScene().getWindow();

            stage.setScene(scene);

            stage.show();
    }

}
