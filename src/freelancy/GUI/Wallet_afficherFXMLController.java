/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package freelancy.GUI;


import freelancy.entite.card;
import freelancy.entite.wallet;
import freelancy.service.wallet_service;
import freelancy.utils.DataSource;
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
public class Wallet_afficherFXMLController implements Initializable {

    @FXML
    private TableColumn<wallet, Long> wid;
    @FXML
    private TableColumn<wallet, Long> wnum;
    @FXML
    private TableColumn<wallet, Float> wsolde;
    @FXML
    private TableColumn<wallet, Float> wbonus;
    @FXML
    private TableColumn<wallet, Long> wuserid;
    @FXML
    private TableView<wallet> tab;

    /**
     * Initializes the controller class.
     */
     public void table(){
         
        wid.setCellValueFactory( new PropertyValueFactory<>("id"));
        wnum.setCellValueFactory(new PropertyValueFactory <>("num_carte"));

        

   
        wsolde.setCellValueFactory(new PropertyValueFactory <>("solde"));
               wbonus.setCellValueFactory(new PropertyValueFactory <>("bonus"));
        wuserid.setCellValueFactory(new PropertyValueFactory <>("iduser"));
        

       
        tab.setItems(RecupBase()); 

         }   
     public static ObservableList<wallet> RecupBase(){
             
    ObservableList<wallet> list = FXCollections.observableArrayList();
    
       java.sql.Connection cnx;
     cnx = DataSource.getInstance().getCnx();
          String sql = "select *from wallet";
    try {
       
        PreparedStatement st = (PreparedStatement) cnx.prepareStatement(sql);

    ResultSet R = st.executeQuery();
    while (R.next()){
        wallet_service us = new wallet_service();
        
        
      wallet r =new wallet();
      r.setId(R.getLong(1));
     r.setNum_carte((R.getLong(2)));
     r.setSolde(R.getFloat(3));
      r.setBonus((R.getFloat(4)));
     r.setIduser(R.getLong(5));
    
     
      
    
     
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
              wallet_service ss = new wallet_service();
            wallet r =new wallet();
           r = tab.getSelectionModel().getSelectedItem();
        ss.supprimer(r.getId());
 table(); 
    }

    @FXML
    private void modif(ActionEvent event) throws IOException {
        wallet selectedC=tab.getSelectionModel().getSelectedItem();
            
            
            FXMLLoader loader= new FXMLLoader(getClass().getResource("ModifierwalletFXML.fxml"));
             Parent view_2=loader.load();
            ModifierwalletFXMLController ModifierController=loader.getController();
           
            ModifierController.getWallet(selectedC);
             ModifierController.w =selectedC;
           
            
           Stage stage=(Stage)((Node)event.getSource()).getScene().getWindow();
            Scene scene = new Scene(view_2);
            stage.setScene(scene);
            stage.show();
    }
    
}
