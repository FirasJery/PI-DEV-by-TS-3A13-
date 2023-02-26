/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package GUI;

import entities.Offre;
import java.net.URL;
import java.util.List;
import java.util.ResourceBundle;
import javafx.fxml.FXML;
import javafx.fxml.Initializable;
import javafx.geometry.Pos;
import javafx.scene.control.Alert;
import javafx.scene.control.Label;
import javafx.scene.control.ScrollPane;
import javafx.scene.layout.GridPane;
import javafx.scene.layout.HBox;
import javafx.scene.layout.VBox;
import javafx.scene.text.Font;
import javafx.scene.text.FontWeight;
import services.ServiceOffre;

/**
 * FXML Controller class
 *
 * @author ASUS
 */
public class AffichageOffreController implements Initializable {


    private ServiceOffre so = new ServiceOffre();
   
    @FXML
    private ScrollPane scrollPane;
   
 
   

    /**
     * Initializes the controller class.
     */
    @Override
    public void initialize(URL location, ResourceBundle resources) {
                ServiceOffre serviceOffre = new ServiceOffre();
        List<Offre> offres = serviceOffre.getAll();

     
        VBox vBox = new VBox();
        vBox.setAlignment(Pos.TOP_CENTER);
        vBox.setSpacing(20);

        HBox hBox = new HBox();
        hBox.setAlignment(Pos.CENTER_LEFT);
        hBox.setSpacing(400);//
        

        int count = 0;
        for (Offre offre : offres) {
            VBox box = createOffreBox(offre);
            hBox.getChildren().add(box);
            count++;

            if (count == 3) {
                vBox.getChildren().add(hBox);
                hBox = new HBox();
                hBox.setAlignment(Pos.CENTER_LEFT);
                hBox.setSpacing(400);
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
        VBox box = new VBox();
        box.setAlignment(Pos.CENTER_LEFT);
        box.setSpacing(5);
         box.setUserData(offre.getId_offre()); // set the ID as the user data for the VBox


        Label title = new Label(offre.getTitle());
        Label description = new Label(offre.getDescription());
        Label category = new Label(offre.getCategory());
        Label type = new Label(offre.getType());
        Label duree = new Label(Integer.toString(offre.getDuree()));

        title.setFont(Font.font("Arial", FontWeight.BOLD, 14));
        description.setWrapText(true);

        box.getChildren().addAll(title, description, category, type, duree);
        
          box.setOnMouseClicked(event -> {
            Alert A = new Alert(Alert.AlertType.INFORMATION);
                    A.setContentText("Selected offer ID: " + box.getUserData());
                    A.showAndWait();
        });


        return box;
    }
}