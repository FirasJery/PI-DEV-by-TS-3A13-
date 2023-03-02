/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package GUI;

import static GUI.AffichageOffreController.id_offre;
import entities.Offre;
import entities.Postulation;
import entities.SessionManager;
import java.io.IOException;
import java.net.URL;
import java.util.HashSet;
import java.util.Iterator;
import java.util.List;
import java.util.Optional;
import java.util.ResourceBundle;
import java.util.Set;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.fxml.Initializable;
import javafx.geometry.Insets;
import javafx.geometry.Pos;
import javafx.scene.control.Alert;
import javafx.scene.control.ButtonType;
import javafx.scene.control.Label;
import javafx.scene.control.ScrollPane;
import javafx.scene.layout.HBox;
import javafx.scene.layout.Pane;
import javafx.scene.layout.VBox;
import javafx.scene.text.Font;
import javafx.scene.text.FontWeight;
import services.ServiceOffre;
import services.ServicePostulation;

/**
 * FXML Controller class
 *
 * @author Firas
 */
public class PostulationPageController implements Initializable {

    @FXML
    private Pane Pane;
    @FXML
    private ScrollPane scrollPane;
    

    /**
     * Initializes the controller class.
     */
    @Override
    public void initialize(URL url, ResourceBundle rb) {
        // TODO
        afficherPostes();
    }    
     public void afficherPostes() {
        
        ServicePostulation sp = new ServicePostulation();
        List<Postulation> lp = sp.getParOffre(AffichageOffreEntrpriseController.id_offreposte);

        VBox vBox = new VBox();
        vBox.setAlignment(Pos.CENTER);
        vBox.setSpacing(20);

        HBox hBox = new HBox();
        hBox.setAlignment(Pos.CENTER);
        hBox.setSpacing(100);//
        //hBox.setStyle("-fx-background-color: #f4f4f4; -fx-border-color: black; -fx-border-width: 2px;");

        int count = 0;
        for (Postulation p : lp) {
            VBox box = createPostulationBox(p);
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

    private VBox createPostulationBox(Postulation poste) {
        ServiceOffre so = new ServiceOffre();
        ServicePostulation sp = new ServicePostulation();
        VBox box = new VBox();
        box.setStyle("-fx-background-color: #8B0000; -fx-border-color: black; -fx-border-width: 2px;");
        box.setMaxSize(500, 500);

        box.setAlignment(Pos.CENTER);
        box.setSpacing(20);
        Insets I = new Insets(20, 0, 20, 0);
        box.setPadding(I);
        box.setUserData(poste.getId_postulation()); // set the ID as the user data for the VBox

        Label title = new Label(poste.getF().getName() + poste.getF().getLastName());
        //Label description = new Label(offre.getDescription());
        Label category = new Label(poste.getO().getTitle());
        // Label type = new Label(offre.getType());
       // Label duree = new Label(Integer.toString(poste.getDuree()) + "mois");

        title.setFont(Font.font("Arial", FontWeight.BOLD, 14));
        //description.setWrapText(true);

        //box.getChildren().addAll(title, description, category, type, duree);
        box.getChildren().addAll(title, category);

        box.setOnMouseClicked(event -> { // Mouse click
            
            Alert A = new Alert(Alert.AlertType.CONFIRMATION);
            A.setContentText("Voulez vous accepter cette postulation ?");
            Optional<ButtonType> result = A.showAndWait();
            if (result.isPresent() && result.get() == ButtonType.OK)
            {
                sp.modifier(poste);
                System.out.println(poste.getO());
                so.accepter(poste.getO());
                
            }
            
            
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
