/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package GUI;

import entities.SessionManager;
import java.io.IOException;
import java.net.URL;
import java.util.ResourceBundle;
import java.util.Set;
import java.util.logging.Level;
import java.util.logging.Logger;
import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.fxml.Initializable;
import javafx.scene.Node;
import javafx.scene.Parent;
import javafx.scene.Scene;
import javafx.scene.control.Alert;
import javafx.scene.control.Button;
import javafx.scene.control.TextField;
import javafx.stage.Stage;
import services.ServiceUser;

/**
 * FXML Controller class
 *
 * @author Firas
 */
public class LoginUIController implements Initializable {

    @FXML
    private Button Button_se_connecter;
    @FXML
    private TextField TF_Email_login;
    @FXML
    private TextField TF_Paswword_login;
    @FXML
    private Button button_inscrire;
    @FXML
    private Button btn_entrep;
    @FXML
    private Button btnMdpOublie;

    /**
     * Initializes the controller class.
     */
    @Override
    public void initialize(URL url, ResourceBundle rb) {
        // TODO
    }

    @FXML
    private void On_annuler_clicked(ActionEvent event) {
        TF_Email_login.setText("");
        TF_Paswword_login.setText("");

    }

    @FXML
    private void ON_seconnecter_clicked(ActionEvent event) throws IOException {
       String page = ""; 
        String email = TF_Email_login.getText();
        String password = TF_Paswword_login.getText();
        int id = -1;
        ServiceUser sa = new ServiceUser();
        Alert alert = new Alert(Alert.AlertType.NONE);
        SessionManager sessionManager = SessionManager.getInstance();
        id = sa.authentification(email, password);
        String role = "";
        if (id == -1)
        {
              alert.setAlertType(Alert.AlertType.WARNING);
                alert.setContentText(" erroné ! ");
                alert.show();
        }
        else {
            sessionManager.setCurrentUser(sa.getOneById(id));
            role = sa.getOneById(id).getRole();
            switch (role) {
            case "Admin":
                alert.setAlertType(Alert.AlertType.INFORMATION);
                alert.setContentText("Admin connecté");
                alert.show();
                page = "/GUI/GestionAdminUI.fxml" ;
                break;
            case "Entreprise":
                alert.setAlertType(Alert.AlertType.INFORMATION);
                alert.setContentText("Entreprise connecté");
                alert.show();
                page = "/GUI/HomePage.fxml" ;

                break;
            case "Freelancer":
                alert.setAlertType(Alert.AlertType.INFORMATION);
                alert.setContentText("Freemlancer connecté");
                alert.show();
                page = "/GUI/HomePage.fxml" ;
                
                break;
        }
             try {

            Parent page1 = FXMLLoader.load(getClass().getResource(page));

            Scene scene = new Scene(page1);

            Stage stage = (Stage) ((Node) event.getSource()).getScene().getWindow();

            stage.setScene(scene);
           

            stage.show();

        } catch (IOException ex) {

           System.out.println(ex.getMessage());

        }
        }

        
    }

    @FXML
    private void ON_inscrire_clicked(ActionEvent event) {
        try {

            Parent page1 = FXMLLoader.load(getClass().getResource("/GUI/AddFreelancer.fxml"));

            Scene scene = new Scene(page1);

            Stage stage = (Stage) ((Node) event.getSource()).getScene().getWindow();

            stage.setScene(scene);

            stage.show();

        } catch (IOException ex) {

           System.out.println(ex.getMessage());

        }

    }

    @FXML
    private void btn_ins_ent_action(ActionEvent event) {
         try {

            Parent page1 = FXMLLoader.load(getClass().getResource("/GUI/AddEntrepriseUI.fxml"));

            Scene scene = new Scene(page1);

            Stage stage = (Stage) ((Node) event.getSource()).getScene().getWindow();

            stage.setScene(scene);

            stage.show();

        } catch (IOException ex) {

           System.out.println(ex.getMessage());

        }
    }

    @FXML
    private void btnMdpOublieAction(ActionEvent event) {
            try {

            Parent page1 = FXMLLoader.load(getClass().getResource("/GUI/ForgotPassword.fxml"));

            Scene scene = new Scene(page1);

            Stage stage = (Stage) ((Node) event.getSource()).getScene().getWindow();

            stage.setScene(scene);

            stage.show();

        } catch (IOException ex) {

           System.out.println(ex.getMessage());

        }
    }
    
    
}
