/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package com.mycompany.services;

import com.codename1.io.ConnectionRequest;
import com.codename1.io.NetworkManager;
import com.mycompany.entities.Utilisateur;
import com.mycompany.utils.Statics;

/**
 *
 * @author Firas
 */
public class ServiceUser {
    
    public static ServiceUser instance = null ; 
    
    
    private ConnectionRequest req ; 
    
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
            System.out.println("date = " + str);
        });
        NetworkManager.getInstance().addToQueueAndWait(req);
    }
    
}
