/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package tests;

import java.io.IOException;
import java.util.logging.Level;
import java.util.logging.Logger;
import javafx.application.Application;
import javafx.event.ActionEvent;
import javafx.event.EventHandler;
import javafx.fxml.FXMLLoader;
import javafx.scene.Parent;
import javafx.scene.Scene;
import javafx.scene.control.Button;
import javafx.scene.layout.StackPane;
import javafx.stage.Stage;

/**
 *
 * @author Firas
 */
public class FxMain extends Application {
    
    @Override
    public void start(Stage primaryStage) throws Exception {
        
        try {
            Parent root = FXMLLoader.load(getClass().getResource("/GUI/LoginUI.fxml"));
            
            // Set up the scene and the stage
            Scene scene = new Scene(root);
            scene.getStylesheets().add("/GUI/style.css");
            primaryStage.setScene(scene);
            primaryStage.setTitle("Your Window Title"); // Set the title of the window
            primaryStage.show(); // Show the window
        } catch (IOException ex) {
            Logger.getLogger(FxMain.class.getName()).log(Level.SEVERE, null, ex);
        }

    }
        
        
    

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        launch(args);
    }
    
}
