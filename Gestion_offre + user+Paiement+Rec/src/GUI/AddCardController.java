/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package GUI;

import entities.Card;
import entities.Reclamation;
import entities.SessionManager;
import java.io.File;
import java.net.URL;
import java.util.List;
import java.util.ResourceBundle;
import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.Initializable;
import javafx.geometry.Pos;
import javafx.scene.control.Button;
import javafx.scene.control.Label;
import javafx.scene.control.ScrollPane;
import javafx.scene.control.TextField;
import javafx.scene.image.Image;
import javafx.scene.image.ImageView;
import javafx.scene.layout.HBox;
import javafx.scene.layout.VBox;
import javafx.scene.text.Font;
import javafx.scene.text.FontWeight;
import services.ServiceCard;
import services.ServiceUser;

/**
 * FXML Controller class
 *
 * @author Ghass
 */
public class AddCardController implements Initializable {

    @FXML
    private TextField tfprenom;
    @FXML
    private TextField tfzip;
    @FXML
    private TextField tfnom;
    @FXML
    private TextField tfville;
    @FXML
    private TextField tfdate;
    @FXML
    private TextField tfnum;
    @FXML
    private TextField tfcvc;
    private ServiceCard sr = new ServiceCard();
    SessionManager sessionManager = SessionManager.getInstance();
    @FXML
    private ScrollPane scrollpane;

    /**
     * Initializes the controller class.
     */
     public void table(){
        List<Card> offres = sr.getMyCards(sessionManager.getCurrentUser().getId());
        VBox vBox = new VBox();
        
        vBox.setAlignment(Pos.TOP_CENTER);
        vBox.setSpacing(30);
        

        HBox hBox = new HBox();
         
        hBox.setAlignment(Pos.CENTER);
        hBox.setSpacing(100);//
        

        int count = 0;
        for (Card offre : offres) {
            VBox box = createOffreBox(offre);
            
            hBox.getChildren().add(box);
            count++;

            if (count == 1) {
                vBox.getChildren().add(hBox);
                hBox = new HBox();
                hBox.setAlignment(Pos.CENTER);
                hBox.setSpacing(100);
                count = 0;
            }
        }

        if (count > 0) {
            vBox.getChildren().add(hBox);
        }

        scrollpane.setContent(vBox);
        scrollpane.setFitToWidth(true);
        scrollpane.setVbarPolicy(ScrollPane.ScrollBarPolicy.AS_NEEDED);
    }
    @Override
    public void initialize(URL url, ResourceBundle rb) {
        table();
        tfnom.setText(sessionManager.getCurrentUser().getName());
        tfprenom.setText(sessionManager.getCurrentUser().getLastName());
        
        // TODO
    }    

    private VBox createOffreBox(Card offre)  {
        VBox box = new VBox();
        
        box.setAlignment(Pos.CENTER);
        box.setSpacing(30);
         box.setUserData(offre.getId()); // set the ID as the user data for the VBox


        Label Num = new Label(offre.getNum());
        File imagef = new File("card");
        Image image = new Image(imagef.toURI().toString());
        ImageView imm = new ImageView();
        imm.setImage(image);
        Label ima = new Label();
        
        
         Button bb = new Button();
         bb.setText("Supprimer");
        
       
        
       
        Label date = new Label(offre.getDate());
        Label sep = new Label("____________________________________________________________________________________________________________________");

     
        
      Num.setStyle("-fx-text-fill : Blue;");
      date.setStyle("-fx-text-fill : Black;");
      sep.setStyle("-fx-text-fill : Red;");
        
        
        Num.setWrapText(true);
        imm.setFitWidth(100);
        imm.setFitHeight(100);
        
        box.getChildren().addAll( Num,date,imm,sep);
        
       
        
        bb.setOnMouseClicked(event -> {
            
            sr.supprimer(offre.getId());
            table();
            
        });
        
        /*bb.setOnMouseClicked(event -> {
            
            sp.supprimer(offre.getId());
            table();
            
        });
        
          box.setOnMouseClicked(event -> {
                
                idd = (offre.getId());
                Poste selected=sp.getOneById(offre.getId());
                tftitre.setText(selected.getTitre());
                tfdesc.setText(selected.getDesc());
                combodomaine.setItems(sd.getalls());
                File imagef = new File(selected.getImg());
                ImagePath=imagef.toURI().toString();
                Image image = new Image(imagef.toURI().toString());
                img.setImage(image);
         
                
                
              
        });

*/
        return box;
    }
    @FXML
    private void ajjj(ActionEvent event) {
        ServiceUser sa = new ServiceUser();
            ServiceCard sd = new ServiceCard();
            
            Card p = new Card();
            p.setPrenom(tfprenom.getText());
            p.setNom(tfnom.getText());
            p.setDate(tfdate.getText());
            p.setCvc(Integer.parseInt(tfcvc.getText()));
            p.setZipcode(Integer.parseInt(tfzip.getText()));
            p.setVille(tfville.getText());
            p.setNum(tfnum.getText());
            
            
            
            
            p.setUser(sessionManager.getCurrentUser());
            
            sd.ajouter(p);
    }
    
}
