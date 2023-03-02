/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package GUI;

import entities.SessionManager;
import entities.Wallet;
import java.io.File;
import java.io.IOException;
import java.net.URL;
import java.util.List;
import java.util.ResourceBundle;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.fxml.Initializable;
import javafx.geometry.Pos;
import javafx.scene.control.Button;
import javafx.scene.control.Label;
import javafx.scene.control.ScrollPane;
import javafx.scene.image.Image;
import javafx.scene.image.ImageView;
import javafx.scene.layout.HBox;
import javafx.scene.layout.Pane;
import javafx.scene.layout.VBox;
import javafx.scene.text.Font;
import javafx.scene.text.FontWeight;
import services.ServiceWallet;

/**
 * FXML Controller class
 *
 * @author Ghass
 */
public class AccWalletController implements Initializable {

    @FXML
    private ScrollPane scrollpane;
    @FXML
    private Label tfuser;
    SessionManager sessionManager = SessionManager.getInstance();
    private ServiceWallet sw = new ServiceWallet();
    @FXML
    private Pane panne;
    /**
     * Initializes the controller class.
     */
    
      public void table(){
         Wallet offres = sw.getOneByUserId(sessionManager.getCurrentUser().getId());
        VBox vBox = new VBox();
        
        vBox.setAlignment(Pos.TOP_CENTER);
        vBox.setSpacing(30);
        

        HBox hBox = new HBox();
         
        hBox.setAlignment(Pos.CENTER);
        hBox.setSpacing(100);//
        
         VBox box = createOffreBox(offres);
            
            hBox.getChildren().add(box);
        

        
            vBox.getChildren().add(hBox);
        

        scrollpane.setContent(vBox);
        scrollpane.setFitToWidth(true);
        scrollpane.setVbarPolicy(ScrollPane.ScrollBarPolicy.AS_NEEDED);
    }
    @Override
    public void initialize(URL url, ResourceBundle rb) {
        // TODO
        
        tfuser.setText("Bienvenue : " +sessionManager.getCurrentUser().getName());   
        table();
}
    
    private VBox createOffreBox(Wallet offre)  {
        VBox box = new VBox();
        
        box.setAlignment(Pos.CENTER);
        box.setSpacing(30);
         box.setUserData(offre.getId()); // set the ID as the user data for the VBox


        Label titre = new Label(offre.getNum_carte());
        
        Label solde = new Label("Solde :" +String.valueOf(offre.getSolde())+"$");
        Label bonus = new Label("Bonus :" +String.valueOf(offre.getBonus())+"$");
        
        Button bb = new Button();
         bb.setText("Depot");
       
        
        
       
        Label user = new Label(offre.getIduser().getName());
       
        Label sep = new Label("_________________________________________________________________________________________________");
        
        
        titre.setFont(Font.font("Arial", FontWeight.BOLD, 29));
        
      user.setStyle("-fx-text-fill : Green;");
      
        
         
        user.setFont(Font.font("Arial", FontWeight.BOLD, 20));
        
        user.setWrapText(true);
       
        
        box.getChildren().addAll( titre,solde,bonus,bb,sep);
        
        bb.setOnMouseClicked(event -> {
           panne.getChildren().clear();
        FXMLLoader loadOffre = new FXMLLoader(getClass().getResource("DepotWallet.fxml"));
         try {
           
            panne.getChildren().add(loadOffre.load());
        } catch (IOException ex) {
            ex.getMessage();
        }
          
            
        });
        
        
        
         


        return box;
    }
}
