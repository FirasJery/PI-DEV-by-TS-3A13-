/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package ReclamationGUI;

import entities.Reclamation;
import entities.SessionManager;
import java.net.URL;
import java.time.LocalDate;
import java.util.ResourceBundle;
import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.Initializable;
import javafx.scene.control.ComboBox;
import javafx.scene.control.TextArea;
import services.ServiceRec;
import services.ServiceUser;

/**
 * FXML Controller class
 *
 * @author Ghass
 */
public class AddRecController implements Initializable {

    @FXML
    private TextArea tfobj;
    @FXML
    private ComboBox<String> combotype;
    SessionManager sessionManager = SessionManager.getInstance();

    /**
     * Initializes the controller class.
     */
    @Override
    public void initialize(URL url, ResourceBundle rb) {
        
        combotype.setValue("Technique");
        combotype.setValue("RH");
        
        // TODO
    }    

    @FXML
    private void add(ActionEvent event) {
        LocalDate today = LocalDate.now();
            ServiceUser sa = new ServiceUser();
            ServiceRec sd = new ServiceRec();
            
            Reclamation p = new Reclamation();
            p.setDesc(tfobj.getText());
            p.setType(combotype.getValue());
            p.setEtat(0);
            
            
            
            
            p.setId_user(sessionManager.getCurrentUser());
            
            sd.ajouter(p);
    }
    
}
