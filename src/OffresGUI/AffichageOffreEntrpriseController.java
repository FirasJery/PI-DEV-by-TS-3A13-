/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package OffresGUI;

import entities.Offre;
import entities.SessionManager;
import java.io.IOException;
import java.net.URL;
import java.util.List;
import java.util.Optional;
import java.util.ResourceBundle;
import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.fxml.Initializable;
import javafx.geometry.Insets;
import javafx.geometry.Pos;
import javafx.scene.control.Alert;
import javafx.scene.control.Button;
import javafx.scene.control.ButtonType;
import javafx.scene.control.Label;
import javafx.scene.control.ScrollPane;
import javafx.scene.layout.HBox;
import javafx.scene.layout.Pane;
import javafx.scene.layout.VBox;
import javafx.scene.text.Font;
import javafx.scene.text.FontWeight;
import services.ServiceOffre;

/**
 * FXML Controller class
 *
 * @author Firas
 */
public class AffichageOffreEntrpriseController implements Initializable {

    @FXML
    private Pane Pane;
    @FXML
    private ScrollPane scrollPane;
    @FXML
    private Button btnMesOffres;
    @FXML
    private Button btnEnCours;
    @FXML
    private Button bntTermines;
    public static int id_offreposte;
    @FXML
    private Button bntNoter;

    /**
     * Initializes the controller class.
     */
    @Override
    public void initialize(URL url, ResourceBundle rb) {
        // TODO
        afficherOffres();

    }

    public void afficherOffres() {
        ServiceOffre serviceOffre = new ServiceOffre();
        List<Offre> offres = serviceOffre.getOffresNotAcceptedParEntreprise(SessionManager.getInstance().getCurrentUser().getId());
        //List<Offre> l2 = serviceOffre.getOffresPostules(SessionManager.getInstance().getCurrentUser().getId());

        VBox vBox = new VBox();
        vBox.setAlignment(Pos.CENTER);
        vBox.setSpacing(20);

        HBox hBox = new HBox();
        hBox.setAlignment(Pos.CENTER);
        hBox.setSpacing(100);//
        //hBox.setStyle("-fx-background-color: #f4f4f4; -fx-border-color: black; -fx-border-width: 2px;");

        int count = 0;
        for (Offre offre : offres) {
            VBox box = createOffreBox(offre);
            box.setPrefWidth(500);
            hBox.getChildren().add(box);
            count++;

            if (count == 3) {
                vBox.getChildren().add(hBox);
                hBox = new HBox();
                hBox.setAlignment(Pos.CENTER);
                hBox.setSpacing(100); // 
                // hBox.setStyle("-fx-background-color: #f4f4f4; -fx-border-color: black; -fx-border-width: 2px;");
                count = 0;
            }
        }

        if (count > 0) {
            vBox.getChildren().add(hBox);
        }

        scrollPane.setContent(vBox);
        scrollPane.setFitToWidth(true);
        scrollPane.setVbarPolicy(ScrollPane.ScrollBarPolicy.AS_NEEDED);
    }

    private VBox createOffreBox(Offre offre) {
        ServiceOffre so = new ServiceOffre();
        VBox box = new VBox();
        box.setStyle("-fx-background-color: #BB0000; -fx-border-color: black; -fx-border-width: 2px;");
        box.setMaxSize(500, 500);

        box.setAlignment(Pos.CENTER);
        box.setSpacing(20);
        Insets I = new Insets(20, 0, 20, 0);
        box.setPadding(I);
        box.setUserData(offre.getId_offre()); // set the ID as the user data for the VBox

        Label title = new Label(offre.getTitle());
        //Label description = new Label(offre.getDescription());
        Label category = new Label(offre.getCategory());
        // Label type = new Label(offre.getType());
        Label duree = new Label(Integer.toString(offre.getDuree()) + "mois");

        title.setFont(Font.font("Arial", FontWeight.BOLD, 14));
        //description.setWrapText(true);

        //box.getChildren().addAll(title, description, category, type, duree);
        box.getChildren().addAll(title, category, duree);

        box.setOnMouseClicked(event -> {
            id_offreposte = offre.getId_offre();
            Pane.getChildren().clear();
            FXMLLoader loadOffre = new FXMLLoader(getClass().getResource("PostulationPage.fxml"));

            try {

                Pane.getChildren().add(loadOffre.load());
            } catch (IOException ex) {
                ex.getMessage();
            }

            // edit scene or switch 
        });

        box.setOnMouseEntered(event -> {
            box.setStyle("-fx-background-color: #8B0000;");
        });

        box.setOnMouseExited(event -> {
            box.setStyle("-fx-background-color: #BB0000;");
        });

        return box;
    }

    public void afficherOffresEncours() {
        ServiceOffre serviceOffre = new ServiceOffre();
        List<Offre> offres = serviceOffre.getOffresAcceptedParEntreprise(SessionManager.getInstance().getCurrentUser().getId());
        //List<Offre> l2 = serviceOffre.getOffresPostules(SessionManager.getInstance().getCurrentUser().getId());

        VBox vBox = new VBox();
        vBox.setAlignment(Pos.CENTER);
        vBox.setSpacing(20);

        HBox hBox = new HBox();
        hBox.setAlignment(Pos.CENTER);
        hBox.setSpacing(100);//
        //hBox.setStyle("-fx-background-color: #f4f4f4; -fx-border-color: black; -fx-border-width: 2px;");

        int count = 0;
        for (Offre offre : offres) {
            VBox box = createOffreBoxEncours(offre);
            box.setPrefWidth(500);
            hBox.getChildren().add(box);
            count++;

            if (count == 3) {
                vBox.getChildren().add(hBox);
                hBox = new HBox();
                hBox.setAlignment(Pos.CENTER);
                hBox.setSpacing(100); // 
                // hBox.setStyle("-fx-background-color: #f4f4f4; -fx-border-color: black; -fx-border-width: 2px;");
                count = 0;
            }
        }

        if (count > 0) {
            vBox.getChildren().add(hBox);
        }

        scrollPane.setContent(vBox);
        scrollPane.setFitToWidth(true);
        scrollPane.setVbarPolicy(ScrollPane.ScrollBarPolicy.AS_NEEDED);
    }

    private VBox createOffreBoxEncours(Offre offre) {
        ServiceOffre so = new ServiceOffre();
        VBox box = new VBox();
        box.setStyle("-fx-background-color: #8B0000; -fx-border-color: black; -fx-border-width: 2px;");
        box.setMaxSize(500, 500);

        box.setAlignment(Pos.CENTER);
        box.setSpacing(20);
        Insets I = new Insets(20, 0, 20, 0);
        box.setPadding(I);
        box.setUserData(offre.getId_offre()); // set the ID as the user data for the VBox

        Label title = new Label(offre.getTitle());
        //Label description = new Label(offre.getDescription());
        Label category = new Label(offre.getCategory());
        // Label type = new Label(offre.getType());
        Label duree = new Label(Integer.toString(offre.getDuree()) + "mois");

        title.setFont(Font.font("Arial", FontWeight.BOLD, 14));
        //description.setWrapText(true);

        //box.getChildren().addAll(title, description, category, type, duree);
        box.getChildren().addAll(title, category, duree);

        box.setOnMouseClicked(event -> {

            Alert A = new Alert(Alert.AlertType.CONFIRMATION);
            A.setContentText("Voulez vous marquez cette offre comme terminée ?");
            Optional<ButtonType> result = A.showAndWait();
            if (result.isPresent() && result.get() == ButtonType.OK) {
                so.terminer(offre);
                System.out.println("offre termine ! ");
            }

            // edit scene or switch 
        });

        box.setOnMouseEntered(event -> {
            box.setStyle("-fx-background-color: #FFA07A;");
        });

        box.setOnMouseExited(event -> {
            box.setStyle("-fx-background-color: #8B0000;");
        });

        return box;
    }

    public void afficherOffresTermines() {
        ServiceOffre serviceOffre = new ServiceOffre();
        List<Offre> offres = serviceOffre.getOffresTerminesParEntreprise(SessionManager.getInstance().getCurrentUser().getId());
        //List<Offre> l2 = serviceOffre.getOffresPostules(SessionManager.getInstance().getCurrentUser().getId());

        VBox vBox = new VBox();
        vBox.setAlignment(Pos.CENTER);
        vBox.setSpacing(20);

        HBox hBox = new HBox();
        hBox.setAlignment(Pos.CENTER);
        hBox.setSpacing(100);//
        //hBox.setStyle("-fx-background-color: #f4f4f4; -fx-border-color: black; -fx-border-width: 2px;");

        int count = 0;
        for (Offre offre : offres) {
            VBox box = createOffreBoxTermines(offre);
            box.setPrefWidth(500);
            hBox.getChildren().add(box);
            count++;

            if (count == 3) {
                vBox.getChildren().add(hBox);
                hBox = new HBox();
                hBox.setAlignment(Pos.CENTER);
                hBox.setSpacing(100); // 
                // hBox.setStyle("-fx-background-color: #f4f4f4; -fx-border-color: black; -fx-border-width: 2px;");
                count = 0;
            }
        }

        if (count > 0) {
            vBox.getChildren().add(hBox);
        }

        scrollPane.setContent(vBox);
        scrollPane.setFitToWidth(true);
        scrollPane.setVbarPolicy(ScrollPane.ScrollBarPolicy.AS_NEEDED);
    }

    private VBox createOffreBoxTermines(Offre offre) {
        ServiceOffre so = new ServiceOffre();
        VBox box = new VBox();
        box.setStyle("-fx-background-color: #8B0000; -fx-border-color: black; -fx-border-width: 2px;");
        box.setMaxSize(500, 500);

        box.setAlignment(Pos.CENTER);
        box.setSpacing(20);
        Insets I = new Insets(20, 0, 20, 0);
        box.setPadding(I);
        box.setUserData(offre.getId_offre()); // set the ID as the user data for the VBox

        Label title = new Label(offre.getTitle());
        //Label description = new Label(offre.getDescription());
        Label category = new Label(offre.getCategory());
        // Label type = new Label(offre.getType());
        Label duree = new Label(Integer.toString(offre.getDuree()) + "mois");

        title.setFont(Font.font("Arial", FontWeight.BOLD, 14));
        //description.setWrapText(true);
        
       
              

        //box.getChildren().addAll(title, description, category, type, duree);
        box.getChildren().addAll(title, category, duree);

        box.setOnMouseClicked(event -> {

           

            // edit scene or switch 
        });

        box.setOnMouseEntered(event -> {
            box.setStyle("-fx-background-color: #FFA07A;");
        });

        box.setOnMouseExited(event -> {
            box.setStyle("-fx-background-color: #8B0000;");
        });

        return box;
    }

    @FXML
    private void btnAjouterOffreAction(ActionEvent event) {

        Pane.getChildren().clear();
        FXMLLoader load = new FXMLLoader(getClass().getResource("AjoutOffre.fxml"));

        try {

            Pane.getChildren().add(load.load());
        } catch (IOException ex) {
            ex.getMessage();
        }
    }

    @FXML
    private void BtnMesOffresAction(ActionEvent event) {
        afficherOffres();
    }

    @FXML
    private void btnEnCoursAction(ActionEvent event) {
        afficherOffresEncours();
    }

    @FXML
    private void bntTerminesAction(ActionEvent event) {
        afficherOffresTermines();
    }

    @FXML
    private void bntNoterAction(ActionEvent event) {
         Pane.getChildren().clear();
            FXMLLoader loadOffre = new FXMLLoader(getClass().getResource("/ReclamationGUI/PageNoterFreelancers.fxml"));

            try {

                Pane.getChildren().add(loadOffre.load());
            } catch (IOException ex) {
                ex.getMessage();
            }
    }

}
