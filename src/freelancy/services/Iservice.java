/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package freelancy.services;

import java.util.List;
/**
 *
 * @author hichem
 */
public interface Iservice <T> {
    public void ajouter(T p);
    public void supprimer(long id);
    public void modifier(T p);
    public List<T> getAll();
    //public List<T> getAllQuestions();
    public T getOneById(long id);
}
