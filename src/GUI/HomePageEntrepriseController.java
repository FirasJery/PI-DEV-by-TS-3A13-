/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package GUI;

import java.io.IOException;
import java.net.URL;
import java.util.ResourceBundle;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.fxml.Initializable;
import javafx.scene.Parent;
import javafx.scene.layout.HBox;

/**
 * FXML Controller class
 *
 * @author Firas
 */
public class HomePageEntrepriseController implements Initializable {

    @FXML
    private HBox navbar;
    @FXML
    private HBox content;
    @FXML
    private HBox bottom_content;

    /**
     * Initializes the controller class.
     */
    @Override
    public void initialize(URL url, ResourceBundle rb) {
        // TODO
         showContent("HomePageContent.fxml");

        // Create a scene and show it in the primary stage
        
    }    
    
    public void showContent(String pathfxml )
    {
      try {
            FXMLLoader loader = new FXMLLoader(getClass().getResource(pathfxml));
            Parent homeView = loader.load();
            content.getChildren().clear();
            content.getChildren().add(homeView);
           
        } catch (IOException e) {
            System.out.println(e.getMessage());
        }
    
    }
    
}
