/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package freelancy.gui;

import freelancy.entities.Question;
import freelancy.entities.Test;
import freelancy.services.ServiceQuestion;
import freelancy.services.ServiceTest;
import java.io.IOException;
import static java.lang.Integer.parseInt;
import java.net.URL;
import java.util.ResourceBundle;
import javafx.event.ActionEvent;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.fxml.Initializable;
import javafx.scene.Node;
import javafx.scene.Parent;
import javafx.scene.Scene;
import javafx.scene.control.TextField;
import javafx.stage.Stage;


/**
 * FXML Controller class
 *
 * @author hichem
 */
public class AjouterQuestionController implements Initializable {

    @FXML
    private TextField TF_Quest;
    @FXML
    private TextField TF_Reponse;
    @FXML
    private TextField TF_Note;

    /**
     * Initializes the controller class.
     */
    @Override
    public void initialize(URL url, ResourceBundle rb) {
        // TODO
    }    

    @FXML
    private void On_Finish_Question(ActionEvent event) throws IOException {
        String question = TF_Quest.getText();
        String reponse = TF_Reponse.getText();
        int note = parseInt(TF_Note.getText());
        
        ServiceQuestion sq = new ServiceQuestion();
        Question q = new Question();
        ServiceTest st = new ServiceTest();
        Test t = new Test();
        //List<Test> list= st.getAll();
        q.setQuestion(question);
        q.setReponse(reponse);
        q.setNote(note);
        q.setIdTest(sq.getLastId(t));
        sq.ajouter(q);
        Parent page1 = FXMLLoader.load(getClass().getResource("/freelancy/gui/AfficherTest.fxml"));

            Scene scene = new Scene(page1);

            Stage stage = (Stage) ((Node) event.getSource()).getScene().getWindow();

            stage.setScene(scene);

            stage.show();
    }

    @FXML
    private void Ajout_Nouvelle_Quest(ActionEvent event) throws IOException {
        String question = TF_Quest.getText();
        String reponse = TF_Reponse.getText();
        int note = parseInt(TF_Note.getText());
        
        ServiceQuestion sq = new ServiceQuestion();
        Question q = new Question();
        ServiceTest st = new ServiceTest();
        Test t = new Test();
        //List<Test> list= st.getAll();
        q.setQuestion(question);
        q.setReponse(reponse);
        q.setNote(note);
        q.setIdTest(sq.getLastId(t));
        sq.ajouter(q);
        Parent page1 = FXMLLoader.load(getClass().getResource("/freelancy/gui/AjouterQuestion.fxml"));

            Scene scene = new Scene(page1);

            Stage stage = (Stage) ((Node) event.getSource()).getScene().getWindow();

            stage.setScene(scene);

            stage.show();
        
    }
    
}
