/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package com.mycompany.services;

import com.codename1.io.CharArrayReader;
import com.codename1.io.ConnectionRequest;
import com.codename1.io.NetworkEvent;
import com.codename1.io.NetworkManager;
import com.codename1.ui.events.ActionListener;
import com.mycompany.entities.Utilisateur;
import com.mycompany.utils.Statics;
import java.util.ArrayList;
import java.util.List;
import java.io.UnsupportedEncodingException;
import com.codename1.io.JSONParser;
import com.codename1.ui.Dialog;
import java.util.Map;
/**
 *
 * @author Firas
 */
public class ServiceUser {
    
    public static ServiceUser instance = null ; 
    private ConnectionRequest req ; 
     public static boolean resultOk = true;
    String json;
   
    
    public static ServiceUser getInstance() 
    {
        if (instance == null)
            instance = new ServiceUser(); 
        return instance ; 
    }
    
    
    public ServiceUser()
    {
        req = new ConnectionRequest();
    }
    
    public void AddUser(Utilisateur u )
    {
        String url = Statics.BASE_URL + "/newAdminMobile?name=" + u.getName() + "&lastName=" + u.getLastName() + 
                "&userName=" + u.getUserName() + 
                "&password=" + u.getPassword() + "&email=" + u.getEmail() + "&image=image.png" ; 
        System.out.println(u.getEmail() );
        req.setUrl(url);
        req.setPost(false);
        req.addResponseListener( (a) -> {
            String str = new String(req.getResponseData());
            System.out.println("data= " + str);
        });
        NetworkManager.getInstance().addToQueueAndWait(req);
    }
    
    public void login(String email , String mdp)
    {
       
                String url = Statics.BASE_URL + "/loginJSON?email=" + email + "&password=" + mdp ;
                System.out.println(url);
                req.setUrl(url);
                req.setPost(false);
              req.addResponseListener((e) ->{
            
            JSONParser j = new JSONParser();
            
            String json = new String(req.getResponseData()) + "";
            
            
            try {
            
            if(json.equals("incorrect password")) {
                Dialog.show("Failure","wrong password","OK",null);
            }
            else if(json.equals("user not found")) 
                    {
                         Dialog.show("Failure","Username not found","OK",null);
                    }
            else {
                System.out.println("data =="+json);
                
                Map<String,Object> user = j.parseJSON(new CharArrayReader(json.toCharArray()));
                
                System.out.println(user);
                Utilisateur u = new Utilisateur();
                double id = (Double) user.get("id");
                int intId = Double.valueOf(id).intValue();
               
                System.out.println(intId);
               u.setId(intId);
                
                SessionManager.getInstance().setCurrentUser(u);
               //SessionManager.setId(intId);//jibt id ta3 user ly3ml login w sajltha fi session ta3i 
                /*SessionManager.setPassowrd(user.get("password").toString());
                SessionManager.setUserName(user.get("username").toString());
                SessionManager.setEmail(user.get("email").toString());*/
                    }
            }catch(Exception ex) {
                ex.printStackTrace();
            }
        });
        NetworkManager.getInstance().addToQueueAndWait(req);
        

        
    }
    
}
