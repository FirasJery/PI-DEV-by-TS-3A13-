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
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.fxml.Initializable;
import javafx.scene.Node;
import javafx.scene.Parent;
import javafx.scene.Scene;
import javafx.scene.control.Button;
import javafx.scene.control.Label;
import javafx.scene.effect.Bloom;
import javafx.scene.effect.Glow;
import javafx.scene.image.Image;
import javafx.scene.image.ImageView;
import javafx.scene.input.MouseEvent;
import javafx.scene.layout.HBox;
import javafx.stage.Stage;

/**
 * FXML Controller class
 *
 * @author Firas
 */
public class HomePageController implements Initializable {

    @FXML
    private HBox navbar;
    @FXML
    private HBox content;
    @FXML
    private HBox bottom_content;
    @FXML
    private ImageView home_btn;
    @FXML
    private Label offres_btn;
    @FXML
    private Label reclamations_btn;
    @FXML
    private Label messages_btn;
    @FXML
    private ImageView profile_btn;
    @FXML
    private Label dc_btn;
    @FXML
    private Label wallet_btn;

    SessionManager sessionManager = SessionManager.getInstance();
    String offre_path = "";

    //Effects
    Bloom bloom = new Bloom(0.3);

    /**
     * Initializes the controller class.
     */
    @Override
    public void initialize(URL url, ResourceBundle rb) {
        switch (sessionManager.getCurrentUser().getRole()) {
            case "Freelancer":
                offres_btn.setText("Offres");
                offre_path = "affichageOffre.fxml";
                break;
            case "Entreprise":
                offres_btn.setText("Offres");
               offre_path = "AffichageOffreEntrprise.fxml";
                break;
            default:
                break;
        }
        //showContent(offre_path);
        showContent("HomePageContent.fxml");

    }

    public void showContent(String pathfxml) {
        try {
            FXMLLoader loader = new FXMLLoader(getClass().getResource(pathfxml));
            Parent homeView = loader.load();
            content.getChildren().clear();
            content.getChildren().add(homeView);

        } catch (IOException e) {
            System.out.println(e.getMessage());
        }

    }

    @FXML
    private void go_home(MouseEvent event) {
        if (event.isPrimaryButtonDown()) {
            showContent("HomePageContent.fxml");
        }
    }

    @FXML
    private void home_effect(MouseEvent event) {
        if (home_btn.getEffect() == null) {
            home_btn.setEffect(bloom);
        } else {
            home_btn.setEffect(null);
        }
    }

    @FXML
    private void go_msg(MouseEvent event) {
        if (event.isPrimaryButtonDown()) {
            showContent("Messagerie.fxml");
            System.out.println("memes");
        }
        
    }

    @FXML
    private void go_offres(MouseEvent event) {
        showContent(offre_path);
    }

    @FXML
    private void go_profile(MouseEvent event) {
        switch (sessionManager.getCurrentUser().getRole()) {
            case "Freelancer":
                showContent("FreelancerProfileUI.fxml");
                break;
            case "Entreprise":
                showContent("EntrepriseProfileUI.fxml");
                break;
            default:
                break;
        }
    }

    @FXML
    private void Se_deconnecterMousePressed(MouseEvent event) {
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
    private void rec(MouseEvent event) {
        showContent("AffReclamationFXML.fxml");
    }

}
