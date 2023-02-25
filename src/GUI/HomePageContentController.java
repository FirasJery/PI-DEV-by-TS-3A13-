/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package GUI;

import java.net.URL;
import java.util.ResourceBundle;
import javafx.fxml.FXML;
import javafx.fxml.Initializable;
import javafx.scene.control.Label;
import javafx.scene.input.MouseEvent;
import javafx.scene.layout.AnchorPane;

/**
 * FXML Controller class
 *
 * @author Firas
 */
public class HomePageContentController implements Initializable {

    @FXML
    private AnchorPane background;
    @FXML
    private Label javalabel;

    /**
     * Initializes the controller class.
     */
    @Override
    public void initialize(URL url, ResourceBundle rb) {
        // TODO
      //  background.setStyle("-fx-background-image: url('bg.png'); -fx-background-size: cover;");
      
    }    

    @FXML
    private void dragEnteredLAbel(MouseEvent event) {
        
        System.out.println("test");
    }
    
}
