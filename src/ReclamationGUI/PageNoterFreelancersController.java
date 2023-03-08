/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package ReclamationGUI;

import entities.Freelancer;
import entities.Review;
import entities.SessionManager;
import java.net.URL;
import java.util.List;
import java.util.Optional;
import java.util.ResourceBundle;
import java.util.stream.Collectors;
import javafx.fxml.FXML;
import javafx.fxml.Initializable;
import javafx.geometry.Insets;
import javafx.geometry.Pos;
import javafx.scene.control.Alert;
import javafx.scene.control.Button;
import javafx.scene.control.ButtonType;
import javafx.scene.control.Label;
import javafx.scene.control.ScrollPane;
import javafx.scene.control.TextField;
import javafx.scene.layout.HBox;
import javafx.scene.layout.VBox;
import javafx.scene.text.Font;
import javafx.scene.text.FontWeight;
import services.ServiceOffre;
import services.ServiceReview;
import services.ServiceUser;

/**
 * FXML Controller class
 *
 * @author Firas
 */
public class PageNoterFreelancersController implements Initializable {

    @FXML
    private ScrollPane scrollPane;
    private ServiceUser su = new ServiceUser();

    /**
     * Initializes the controller class.
     */
    @Override
    public void initialize(URL url, ResourceBundle rb) {
        // TODO
        afficherFreelancersAnoter();
    }

    public void afficherFreelancersAnoter() {
        ServiceUser su = new ServiceUser();
        List<Freelancer> lo = su.getFreelancersByJob(SessionManager.getInstance().getCurrentUser().getId());
        List<Freelancer> offres = lo.stream().distinct().collect(Collectors.toList());
        System.out.println(lo);
        System.out.println(offres);
        VBox vBox = new VBox();
        vBox.setAlignment(Pos.CENTER);
        vBox.setSpacing(20);

        HBox hBox = new HBox();
        hBox.setAlignment(Pos.CENTER);
        hBox.setSpacing(100);//
        //hBox.setStyle("-fx-background-color: #f4f4f4; -fx-border-color: black; -fx-border-width: 2px;");

        int count = 0;
        for (Freelancer offre : offres) {
            VBox box = createOffreBoxFreelancerAnoter(offre);
            box.setPrefWidth(300);
            box.setPrefHeight(300);
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

    private VBox createOffreBoxFreelancerAnoter(Freelancer offre) {
        ServiceOffre so = new ServiceOffre();
        ServiceReview sr = new ServiceReview();

        VBox box = new VBox();
        box.setStyle("-fx-background-color: #8B0000; -fx-border-color: black; -fx-border-width: 2px;");
        box.setMaxSize(500, 500);

        box.setAlignment(Pos.CENTER);
        box.setSpacing(20);
        Insets I = new Insets(20, 0, 20, 0);
        box.setPadding(I);
        box.setUserData(offre.getId()); // set the ID as the user data for the VBox

        Label title = new Label(offre.getName());
        //Label description = new Label(offre.getDescription());
        Label category = new Label(offre.getLastName());
        // Label type = new Label(offre.getType());
        Label duree = new Label("");

        title.setFont(Font.font("Arial", FontWeight.BOLD, 14));
        //description.setWrapText(true);
        Button rate = new Button();
        rate.setText("Noter");
        Review c = sr.RechecherReview(SessionManager.getInstance().getCurrentUser().getId(), offre.getId());
        if (c == null) {
            rate.setVisible(true);
            duree.setVisible(false);
        } else {
            rate.setVisible(false);
            duree.setText(c.getNote() + " /10");

        }

        rate.setOnMouseClicked(event -> {

            System.out.println("test rate");
            Alert alert = new Alert(Alert.AlertType.CONFIRMATION);

            alert.setTitle("Noter");
            alert.setHeaderText("Donner une note et confirmer");

            Label noteLabel = new Label("Note: /10");
            TextField noteField = new TextField();
            noteLabel.setLabelFor(noteField);

            Label messageLabel = new Label("Message:");
            TextField messageField = new TextField();
            messageLabel.setLabelFor(messageField);

            VBox vBox = new VBox(noteLabel, noteField, messageLabel, messageField);
            vBox.setSpacing(10);
            
            alert.getDialogPane().setContent(vBox);
            Optional<ButtonType> result = alert.showAndWait();
            if (result.isPresent() && result.get() == ButtonType.OK) {
                // Get the values from the text fields
                int note = Integer.parseInt(noteField.getText());
                String message = messageField.getText();
                //ServiceReview sr = new ServiceReview(); 

                Review r = new Review();
                r.setId_editeur(SessionManager.getInstance().getCurrentUser());
                r.setMessage(message);
                r.setNote(note);
                r.setId_user(offre);
                sr.ajouter(r);
                ////////////////////////// review part 
                List <Review> lr = sr.getReviewsByFreelancer(offre.getId());
                double noteGlobale = lr.stream().mapToDouble(e -> e.getNote()).average().orElse(0.0);
                Freelancer f = (Freelancer) su.getOneById(offre.getId());
                f.setRating((float)noteGlobale);
                
            }

        });

        //box.getChildren().addAll(title, description, category, type, duree);
        box.getChildren().addAll(title, category, duree, rate);

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

}
