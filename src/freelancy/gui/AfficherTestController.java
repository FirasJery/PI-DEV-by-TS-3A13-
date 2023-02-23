/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package freelancy.gui;

import freelancy.entities.Test;
import freelancy.services.ServiceTest;
import java.io.IOException;
import static java.lang.Integer.parseInt;
import java.net.URL;
import java.util.ArrayList;
import java.util.List;
import java.util.Optional;
import java.util.ResourceBundle;
import javafx.collections.FXCollections;
import javafx.collections.ObservableList;
import javafx.event.ActionEvent;
import javafx.event.EventType;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.fxml.Initializable;
import javafx.scene.Node;
import javafx.scene.Parent;
import javafx.scene.Scene;
import javafx.scene.control.Alert;
import javafx.scene.control.ButtonType;
import javafx.scene.control.ListView;
import javafx.scene.control.TextField;
import javafx.stage.Stage;



/**
 * FXML Controller class
 *
 * @author hichem
 */
public class AfficherTestController implements Initializable {

    Test test = new Test();
    private ServiceTest st = new ServiceTest();
    ArrayList<Test> lst = new ArrayList<>();
    
    
    @FXML
    private ListView<Test> list = new ListView<>();
    ObservableList<Test> items = FXCollections.observableArrayList(st.getAll());
    @FXML
    private TextField supp;

    private long id = test.getIdTest();
    
    
    
    

    /**
     * Initializes the controller class.
     */
    @Override
    public void initialize(URL url, ResourceBundle rb) {
        list.setItems(items);
        list.setOnMouseClicked(event ->{
         Test tes = list.getSelectionModel().getSelectedItem();
         long id = tes.getIdTest();
        });
        
        
    }    

    @FXML
    private void Ajout_OnClick(ActionEvent event) throws IOException {
        Parent page1 = FXMLLoader.load(getClass().getResource("/freelancy/gui/AjoutTestUI.fxml"));

            Scene scene = new Scene(page1);

            Stage stage = (Stage) ((Node) event.getSource()).getScene().getWindow();

            stage.setScene(scene);

            stage.show();
    }

    @FXML
    private void Supprimer_OnClick(ActionEvent event) throws IOException {
        String sup = supp.getText();
        Alert alert = new Alert(Alert.AlertType.CONFIRMATION);
            alert.setTitle("Confirmation Message");
            alert.setHeaderText(null);
            alert.setContentText("Voulez vous supprimer eleve ?");

            Optional<ButtonType> buttonType = alert.showAndWait();
            if (buttonType.get() == ButtonType.OK) {
             st.supprimer(parseInt(sup));
            }else{
              return;            
                    }
            Parent page1 = FXMLLoader.load(getClass().getResource("/freelancy/gui/AfficherTest.fxml"));

            Scene scene = new Scene(page1);

            Stage stage = (Stage) ((Node) event.getSource()).getScene().getWindow();

            stage.setScene(scene);

            stage.show();
    }

    @FXML
    private void Question_OnClick(ActionEvent event) throws IOException {
        Parent page1 = FXMLLoader.load(getClass().getResource("/freelancy/gui/AfficherQuestion.fxml"));

            Scene scene = new Scene(page1);

            Stage stage = (Stage) ((Node) event.getSource()).getScene().getWindow();

            stage.setScene(scene);

            stage.show();
    }

    
    
}

