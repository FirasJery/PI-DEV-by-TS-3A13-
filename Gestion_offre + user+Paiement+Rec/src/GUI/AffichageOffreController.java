/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package GUI;

import entities.Offre;
import entities.SessionManager;
import java.io.IOException;
import java.net.URL;
import java.util.HashSet;
import java.util.Iterator;
import java.util.List;
import java.util.Optional;
import java.util.ResourceBundle;
import java.util.Set;
import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.fxml.Initializable;
import javafx.geometry.Insets;
import javafx.geometry.Pos;
import javafx.scene.control.Alert;
import javafx.scene.control.Alert.AlertType;
import javafx.scene.control.Button;
import javafx.scene.control.ButtonBar.ButtonData;
import javafx.scene.control.ButtonType;
import javafx.scene.control.Label;
import javafx.scene.control.ScrollPane;
import javafx.scene.layout.GridPane;
import javafx.scene.layout.HBox;
import javafx.scene.layout.Pane;
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
    @FXML
    private Button btnOffre;
    @FXML
    private Pane Pane;
    public static int id_offre ; 

    /**
     * Initializes the controller class.
     */
    @Override
    public void initialize(URL location, ResourceBundle resources) {
        afficherOffres();
    }

    @FXML
    private void btnOffreAction(ActionEvent event) {
        afficherOffres();
    }

    @FXML
    private void btnOffreEncoursAction(ActionEvent event) {
        afficherOffresEncours(SessionManager.getInstance().getCurrentUser().getId());
    }

    @FXML
    private void btnOffreTermineAction(ActionEvent event) {
        afficherOffresTermines(SessionManager.getInstance().getCurrentUser().getId());
    }

    public void afficherOffres() {
        ServiceOffre serviceOffre = new ServiceOffre();
        List<Offre> offres = serviceOffre.getAll();
        List<Offre> l2 = serviceOffre.getOffresPostules(SessionManager.getInstance().getCurrentUser().getId());
        Set<Offre> set2 = new HashSet<>(l2);
        Iterator<Offre> iter1 = offres.iterator();
        while (iter1.hasNext()) {
            Offre offer = iter1.next();
            if (set2.contains(offer)) {
                iter1.remove();
            }
        }

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
            id_offre = offre.getId_offre();
            Pane.getChildren().clear();
             FXMLLoader loadOffre = new FXMLLoader(getClass().getResource("OffrePage.fxml"));
        
        try {
           
            Pane.getChildren().add(loadOffre.load());
        } catch (IOException ex) {
            ex.getMessage();
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

    public void afficherOffresEncours(int id_freelancer) {
        ServiceOffre serviceOffre = new ServiceOffre();
        List<Offre> offres = serviceOffre.getOffresEncours(id_freelancer);

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

    private VBox createOffreEncoursBox(Offre offre) {
        ServiceOffre so = new ServiceOffre();
        VBox box = new VBox();
        box.setStyle("-fx-background-color: #8B0000; -fx-border-color: black; -fx-border-width: 2px;");
        box.setMaxSize(500, 500);

        box.setAlignment(Pos.CENTER);
        box.setSpacing(20);
        box.setUserData(offre.getId_offre()); // set the ID as the user data for the VBox

        Label title = new Label(offre.getTitle());
        Label description = new Label(offre.getDescription());
        Label category = new Label(offre.getCategory());
        Label type = new Label(offre.getType());
        Label duree = new Label(Integer.toString(offre.getDuree()) + "mois");

        title.setFont(Font.font("Arial", FontWeight.BOLD, 14));
        description.setWrapText(true);

        box.getChildren().addAll(title, description, category, type, duree);

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

    public void afficherOffresTermines(int id_freelancer) {
        ServiceOffre serviceOffre = new ServiceOffre();
        List<Offre> offres = serviceOffre.getOffresTermines(id_freelancer);

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

    private VBox createOffreTermineBox(Offre offre) {
        ServiceOffre so = new ServiceOffre();
        VBox box = new VBox();
        box.setStyle("-fx-background-color: #8B0000; -fx-border-color: black; -fx-border-width: 2px;");
        box.setMaxSize(500, 500);

        box.setAlignment(Pos.CENTER);
        box.setSpacing(20);
        box.setUserData(offre.getId_offre()); // set the ID as the user data for the VBox

        Label title = new Label(offre.getTitle());
        Label description = new Label(offre.getDescription());
        Label category = new Label(offre.getCategory());
        Label type = new Label(offre.getType());
        Label duree = new Label(Integer.toString(offre.getDuree()) + "mois");

        title.setFont(Font.font("Arial", FontWeight.BOLD, 14));
        description.setWrapText(true);

        box.getChildren().addAll(title, description, category, type, duree);

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
    private void btnOffrePostulesAction(ActionEvent event) {
        afficherOffresPostules(SessionManager.getInstance().getCurrentUser().getId());
    }

    public void afficherOffresPostules(int id_freelancer) {
        ServiceOffre serviceOffre = new ServiceOffre();
        List<Offre> offres = serviceOffre.getOffresPostules(id_freelancer);

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

    private VBox createOffrePostulesBox(Offre offre) {
        ServiceOffre so = new ServiceOffre();
        VBox box = new VBox();
        box.setStyle("-fx-background-color: #8B0000; -fx-border-color: black; -fx-border-width: 2px;");
        box.setMaxSize(500, 500);

        box.setAlignment(Pos.CENTER);
        box.setSpacing(20);
        box.setUserData(offre.getId_offre()); // set the ID as the user data for the VBox

        Label title = new Label(offre.getTitle());
        Label description = new Label(offre.getDescription());
        Label category = new Label(offre.getCategory());
        Label type = new Label(offre.getType());
        Label duree = new Label(Integer.toString(offre.getDuree()) + "mois");

        title.setFont(Font.font("Arial", FontWeight.BOLD, 14));
        description.setWrapText(true);

        box.getChildren().addAll(title, description, category, type, duree);

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
