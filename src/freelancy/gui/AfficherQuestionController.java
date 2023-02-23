/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package freelancy.gui;

import freelancy.entities.Question;
import freelancy.services.ServiceQuestion;
import java.io.IOException;
import static java.lang.Integer.parseInt;
import java.net.URL;
import java.util.Optional;
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
public class AfficherQuestionController implements Initializable {
    Question quest = new Question();
    
    
    //long id = quest.getIdTest();
    
    
    ServiceQuestion sq = new ServiceQuestion();
    
    @FXML
    private ListView<Question> list;
    ObservableList<Question> items = FXCollections.observableArrayList(sq.getAll());
    @FXML
    private TextField supp;

    /**
     * Initializes the controller class.
     */
    @Override
    public void initialize(URL url, ResourceBundle rb) {
        // TODO
        list.setItems(items);
        list.setOnMouseClicked(eventt ->{
         Question tes = list.getSelectionModel().getSelectedItem();
         long id = tes.getIdTest();
        });
        
    }    

    @FXML
    private void On_Click_Supp(ActionEvent event) throws IOException {
        String sup = supp.getText();
        list.setOnMouseClicked(eventt ->{
         Question tes = list.getSelectionModel().getSelectedItem();
         long id = tes.getIdTest();
        });
        
        Alert alert = new Alert(Alert.AlertType.CONFIRMATION);
            alert.setTitle("Confirmation Message");
            alert.setHeaderText(null);
            alert.setContentText("Voulez vous supprimer une question ?");

            Optional<ButtonType> buttonType = alert.showAndWait();
            if (buttonType.get() == ButtonType.OK) {
             sq.supprimer(parseInt(sup));
            }else{
              return;            
                    }
            Parent page1 = FXMLLoader.load(getClass().getResource("/freelancy/gui/AfficherQuestion.fxml"));

            Scene scene = new Scene(page1);

            Stage stage = (Stage) ((Node) event.getSource()).getScene().getWindow();

            stage.setScene(scene);

            stage.show();
    }
    
}
