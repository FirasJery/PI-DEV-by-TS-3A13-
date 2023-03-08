/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package GUI;

import entities.SessionManager;
import java.io.IOException;
import java.net.URL;
import java.util.ResourceBundle;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.fxml.Initializable;
import javafx.scene.Parent;
import javafx.scene.input.MouseEvent;
import javafx.scene.layout.AnchorPane;
import javafx.scene.layout.HBox;

/**
 * FXML Controller class
 *
 * @author Firas
 */
public class BackGUIController implements Initializable {

    @FXML
    private AnchorPane anchorBack;
    @FXML
    private HBox navbar;
    @FXML
    private HBox content;
    SessionManager sm = SessionManager.getInstance();

    /**
     * Initializes the controller class.
     */
    @Override
    public void initialize(URL url, ResourceBundle rb) {
        // TODO
        sm.setCurrentHbox(content);
    }    
    
     public void showContent(String pathfxml) {
        try {
            FXMLLoader loader = new FXMLLoader(getClass().getResource(pathfxml));
            Parent homeView = loader.load();
            content.getChildren().clear();
            content.getChildren().add(homeView);
            

        } catch (IOException e) {
            System.out.println(e.getMessage());
        }
        
    }

    @FXML
    private void goUtil(MouseEvent event) {
        showContent("/UserGUI/GestionAdminUI.fxml");
    }

    @FXML
    private void goOffre(MouseEvent event) {
    }

    @FXML
    private void goReclam(MouseEvent event) {
    }

    @FXML
    private void goMessagerie(MouseEvent event) {
        showContent("/MessagerieGUI/MessagerieBack.fxml");
    }

    @FXML
    private void goWallet(MouseEvent event) {
    }

    @FXML
    private void goCertif(MouseEvent event) {
        showContent("/CertifGUI/ListeCertif.fxml");
    }
    
}
