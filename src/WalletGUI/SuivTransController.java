/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package WalletGUI;

import entities.Data;
import entities.Reclamation;
import entities.SessionManager;
import entities.Transaction;
import java.net.URL;
import java.sql.Date;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.HashMap;
import java.util.List;
import java.util.Map;
import java.util.ResourceBundle;
import javafx.collections.FXCollections;
import javafx.collections.ObservableList;
import javafx.fxml.FXML;
import javafx.fxml.Initializable;
import javafx.geometry.Pos;
import javafx.scene.chart.BarChart;
import javafx.scene.chart.CategoryAxis;
import javafx.scene.chart.LineChart;
import javafx.scene.chart.NumberAxis;
import javafx.scene.chart.XYChart;
import javafx.scene.control.Button;
import javafx.scene.control.Label;
import javafx.scene.control.ScrollPane;
import javafx.scene.input.MouseEvent;
import javafx.scene.layout.HBox;
import javafx.scene.layout.Pane;
import javafx.scene.layout.VBox;
import javafx.scene.text.Font;
import javafx.scene.text.FontWeight;
import services.ServiceRec;
import services.ServiceTrans;
import services.ServiceWallet;

/**
 * FXML Controller class
 *
 * @author Ghass
 */
public class SuivTransController implements Initializable {

    @FXML
    private ScrollPane scrollpane;
    private ServiceTrans sr = new ServiceTrans();
    private ServiceWallet swall = new ServiceWallet();
    SessionManager sessionManager = SessionManager.getInstance();
    @FXML
    private Label tfenv;
    @FXML
    private Label tfrec;
    @FXML
    private Label tfdash;
    @FXML
    private Pane pane;
    private Pane pana;

    /**
     * Initializes the controller class.
     */
     public void table(){
        List<Transaction> offres = sr.getMyStrans(swall.getOneByUserId(sessionManager.getCurrentUser().getId()).getId());
        VBox vBox = new VBox();
        
        vBox.setAlignment(Pos.TOP_CENTER);
        vBox.setSpacing(30);
        

        HBox hBox = new HBox();
         
        hBox.setAlignment(Pos.CENTER);
        hBox.setSpacing(100);//
        

        int count = 0;
        for (Transaction offre : offres) {
            VBox box = createOffreBox(offre);
            
            hBox.getChildren().add(box);
            count++;

            if (count == 1) {
                vBox.getChildren().add(hBox);
                hBox = new HBox();
                hBox.setAlignment(Pos.CENTER);
                hBox.setSpacing(100);
                count = 0;
            }
        }

        if (count > 0) {
            vBox.getChildren().add(hBox);
        }

        scrollpane.setContent(vBox);
        scrollpane.setFitToWidth(true);
        scrollpane.setVbarPolicy(ScrollPane.ScrollBarPolicy.AS_NEEDED);
    }
      public void tableR(){
        List<Transaction> offres = sr.getMyRtrans(swall.getOneByUserId(sessionManager.getCurrentUser().getId()).getId());
        VBox vBox = new VBox();
        
        vBox.setAlignment(Pos.TOP_CENTER);
        vBox.setSpacing(30);
        

        HBox hBox = new HBox();
         
        hBox.setAlignment(Pos.CENTER);
        hBox.setSpacing(100);//
        

        int count = 0;
        for (Transaction offre : offres) {
            VBox box = createOffreBoxR(offre);
            
            hBox.getChildren().add(box);
            count++;

            if (count == 1) {
                vBox.getChildren().add(hBox);
                hBox = new HBox();
                hBox.setAlignment(Pos.CENTER);
                hBox.setSpacing(100);
                count = 0;
            }
        }

        if (count > 0) {
            vBox.getChildren().add(hBox);
        }

        scrollpane.setContent(vBox);
        scrollpane.setFitToWidth(true);
        scrollpane.setVbarPolicy(ScrollPane.ScrollBarPolicy.AS_NEEDED);
    }
    @Override
    public void initialize(URL url, ResourceBundle rb) {
        
        
        // TODO
    }    
     private VBox createOffreBox(Transaction offre)  {
        VBox box = new VBox();
        
        box.setAlignment(Pos.CENTER);
        box.setSpacing(30);
         box.setUserData(offre.getId()); // set the ID as the user data for the VBox


        Label Date = new Label("Date :  "+offre.getDate());
        
        
         Button bb = new Button();
         bb.setText("Supprimer");
        
        Label montant = new Label("Montant :"+String.valueOf(offre.getMontant())+"DT");
        Label rec = new Label("Envoye a :"+offre.getR_wallet().getIduser().getName());
        
       
        ;
        Label sep = new Label("____________________________________________________________________________________________________________________");

     
        
      rec.setStyle("-fx-text-fill : Blue;");
      montant.setStyle("-fx-text-fill : WHITE;");
      Date.setStyle("-fx-text-fill : WHITE;");
        
         rec.setFont(Font.font("Serif", FontWeight.LIGHT, 23));
         montant.setFont(Font.font("Serif", FontWeight.LIGHT, 23));
        Date.setFont(Font.font("Arial", FontWeight.BOLD, 29));
        
        Date.setWrapText(true);
        box.getChildren().addAll( Date,montant,rec,sep);
        URL imageUrl = getClass().getResource("/resources/trans.jpg");
       ;
             box.setStyle("-fx-background-color : #FF2E2E");
        box.setStyle("-fx-background-image: url('" + imageUrl + "');");
        bb.setOnMouseClicked(event -> {
            
            sr.supprimer(offre.getId());
            table();
            
        });
        return box;
}
     private VBox createOffreBoxR(Transaction offre)  {
        VBox box = new VBox();
        
        box.setAlignment(Pos.CENTER);
        box.setSpacing(30);
         box.setUserData(offre.getId()); // set the ID as the user data for the VBox


        Label Date = new Label("Message :  "+offre.getDate());
        
        
         Button bb = new Button();
         bb.setText("Supprimer");
        
        Label montant = new Label("Montant :"+String.valueOf(offre.getMontant())+"DT");
        Label rec = new Label("Recu de :"+ offre.getS_wallet().getIduser().getName());
        Label sep = new Label("____________________________________________________________________________________________________________________");
      rec.setStyle("-fx-text-fill : Blue;");
      montant.setStyle("-fx-text-fill : WHITE;");
      Date.setStyle("-fx-text-fill : WHITE;");
       
         rec.setFont(Font.font("Serif", FontWeight.LIGHT, 23));
         montant.setFont(Font.font("Serif", FontWeight.LIGHT, 23));
        Date.setFont(Font.font("Arial", FontWeight.BOLD, 29));
        
        Date.setWrapText(true);
         URL imageUrl = getClass().getResource("/resources/trans.jpg");
        box.getChildren().addAll( Date,montant,rec,sep,bb);
             box.setStyle("-fx-background-color : #FF2E2E");
        box.setStyle("-fx-background-image: url('" + imageUrl + "');");
        bb.setOnMouseClicked(event -> {
            
            sr.supprimer(offre.getId());
            table();
            
        });
        return box;
}


    @FXML
    private void tfenv(MouseEvent event) {
        table();
    }

    @FXML
    private void tfrec(MouseEvent event) {
        tableR();
    }

    @FXML
    private void tfdash(MouseEvent event) throws SQLException {
        
        Button nn = new Button();
       
            CategoryAxis xAxis = new CategoryAxis();
        NumberAxis yAxis = new NumberAxis();
        BarChart<String, Number> chart = new BarChart<>(xAxis, yAxis);
        chart.setTitle("Transaction Count by Date");
        xAxis.setLabel("Date");
        yAxis.setLabel("Count");
        ObservableList<Data> data = FXCollections.observableArrayList();
        data=sr.getData(swall.getOneByUserId(sessionManager.getCurrentUser().getId()).getId());
         XYChart.Series<String, Number> series = new XYChart.Series<>();
for (Data d : data) {
    series.getData().add(new XYChart.Data<>(d.date, d.count));
}
chart.getData().add(series);

// Create the chart
CategoryAxis xxAxis = new CategoryAxis();
NumberAxis yyAxis = new NumberAxis();
LineChart<String, Number> chartt = new LineChart<>(xxAxis, yyAxis);
chartt.setTitle("Transaction Count Over Time");
xAxis.setLabel("Date");
yAxis.setLabel("Count");

// Group data by date
Map<String, Integer> dataByDate = new HashMap<>();
for (Data d : data) {
    if (dataByDate.containsKey(d.date)) {
        dataByDate.put(d.date, dataByDate.get(d.date) + d.count);
    } else {
        dataByDate.put(d.date, d.count);
    }
}

// Add data to chart
XYChart.Series<String, Number> seriess = new XYChart.Series<>();
for (Map.Entry<String, Integer> entry : dataByDate.entrySet()) {
    seriess.getData().add(new XYChart.Data<>(entry.getKey(), entry.getValue()));
}
chartt.getData().add(seriess);
chartt.setLayoutX(100);
chartt.setLayoutY(150);
pane.getChildren().clear();

pane.getChildren().add(chart);

    }
    
}
