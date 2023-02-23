/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package freelancy.service;

import java.util.List;


/**
 *
 * @author Ghass
 */
public interface Iservice <T> {
     public void ajouter(T p);
    public void supprimer(long id);
    public void modifier(T p);
    public List<T> getAll();
    public T getOneById(long id);
    
}
