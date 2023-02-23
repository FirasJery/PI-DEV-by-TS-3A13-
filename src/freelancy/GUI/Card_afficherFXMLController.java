/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package freelancy.GUI;
import freelancy.utils.DataSource;
import freelancy.entite.card;
import freelancy.service.card_service;
import java.io.IOException;
import java.net.URL;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ResourceBundle;
import javafx.collections.FXCollections;
import javafx.collections.ObservableList;
import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.fxml.Initializable;
import javafx.scene.Node;
import javafx.scene.Parent;
import javafx.scene.Scene;
import javafx.scene.control.TableColumn;
import javafx.scene.control.TableView;
import javafx.scene.control.cell.PropertyValueFactory;
import javafx.stage.Stage;

/**
 * FXML Controller class
 *
 * @author Ghass
 */
public class Card_afficherFXMLController implements Initializable {

    @FXML
    private TableView<card> tab;
    @FXML
    private TableColumn<card, String> nom;
    @FXML
    private TableColumn<card, String> prenom;
    @FXML
    private TableColumn<card, String> date;
    @FXML
    private TableColumn<card,Integer> cvc;
    @FXML
    private TableColumn<card, Integer> zip;
    @FXML
    private TableColumn<card, Long> num;
    @FXML
    private TableColumn<card, String> ville;
    @FXML
    private TableColumn<card, Long> cid;

    /**
     * Initializes the controller class.
     */
    public void table(){
         
        nom.setCellValueFactory( new PropertyValueFactory<>("nom"));
        prenom.setCellValueFactory(new PropertyValueFactory <>("prenom"));

        date.setCellValueFactory(new PropertyValueFactory <>("Date_expiration"));

   
        cvc.setCellValueFactory(new PropertyValueFactory <>("cvc"));
                zip.setCellValueFactory(new PropertyValueFactory <>("zipcode"));
        ville.setCellValueFactory(new PropertyValueFactory <>("ville"));
        num.setCellValueFactory(new PropertyValueFactory <>("num"));
        cid.setCellValueFactory(new PropertyValueFactory <>("id"));

       
        tab.setItems(RecupBase()); 

         }   
    public static ObservableList<card> RecupBase(){
             
    ObservableList<card> list = FXCollections.observableArrayList();
    
       java.sql.Connection cnx;
     cnx = DataSource.getInstance().getCnx();
          String sql = "select *from credit_card";
    try {
       
        PreparedStatement st = (PreparedStatement) cnx.prepareStatement(sql);

    ResultSet R = st.executeQuery();
    while (R.next()){
        card_service us = new card_service();
        
        
      card r =new card();
      r.setId(R.getLong(1));
     r.setNom((R.getString("nom")));
     r.setPrenom(R.getString("prenom"));
      r.setDate((R.getString("Date_expiration")));
     r.setCvc(R.getInt(5));
     r.setSipcode(R.getInt(6));
     r.setVille(R.getString("ville"));
     r.setNum(R.getLong(8));
     
      
    
     
      list.add(r);
    }
    }catch (SQLException ex){
    ex.getMessage(); 
    } 
    return list;
    }
    @Override
    public void initialize(URL url, ResourceBundle rb) {
        // TODO
        table();
    }    

    @FXML
    private void supp(ActionEvent event) {
            card_service ss = new card_service();
            card r =new card();
           r = tab.getSelectionModel().getSelectedItem();
        ss.supprimer(r.getId());
 table(); 
        
    }

    @FXML
    private void modif(ActionEvent event) throws IOException {
        card selectedC=tab.getSelectionModel().getSelectedItem();
            
            
            FXMLLoader loader= new FXMLLoader(getClass().getResource("ModifierCardFXML.fxml"));
             Parent view_2=loader.load();
            ModifierCardFXMLController ModifierController=loader.getController();
           
            ModifierController.getCard(selectedC);
             ModifierController.C =selectedC;
           
            
           Stage stage=(Stage)((Node)event.getSource()).getScene().getWindow();
            Scene scene = new Scene(view_2);
            stage.setScene(scene);
            stage.show();
    }
    
}
