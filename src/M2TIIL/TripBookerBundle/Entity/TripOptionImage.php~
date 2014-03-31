<?php

namespace M2TIIL\TripBookerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TripOptionImage
 *
 * @ORM\Table(name="trip_option_image")
 * @ORM\Entity(repositoryClass="M2TIIL\TripBookerBundle\Entity\TripOptionImageRepository")
 * @ORM\HasLifecycleCallbacks
 */
class TripOptionImage
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="uri", type="string", length=255)
     */
    private $uri;

    private $file;
    private $tempFilename;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return TripOptionImage
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set uri
     *
     * @param string $uri
     * @return TripOptionImage
     */
    public function setUri($uri)
    {
        $this->uri = $uri;

        return $this;
    }

    /**
     * Get uri
     *
     * @return string 
     */
    public function getUri()
    {
        return $this->uri;
    }

    /**

     * @ORM\PrePersist
     * @ORM\PreUpdate
    */
    public function preUpload()
    {
        // Si jamais il n'y a pas de fichier (champ facultatif)
        if (null === $this->file) {
            return;
        }

        // Le nom du fichier est son id, on doit juste stocker également son extension
        // Pour faire propre, on devrait renommer cet attribut en "extension", plutôt que "uri"
        $this->uri = $this->file->guessExtension();

        // Et on génère l'attribut title de la balise <img>, à la valeur du nom du fichier sur le PC de l'internaute
        $this->title = $this->file->getClientOriginalName();
    }

    /**
    * @ORM\PostPersist
    * @ORM\PostUpdate
    */
    public function upload()
    {
        // Si jamais il n'y a pas de fichier (champ facultatif)
        if (null === $this->file) {
            return;
        }

        $nonRetinaImgPath = '../../uploads/'.$this->id.'.'.$this->uri;
        $retinaImgPath = '../../uploads/'.$this->id.'-2x.'.$this->uri;
        $tabletImgPath = '../../uploads/'.$this->id.'-tablet.'.$this->uri;

        // Si on avait un ancien fichier, on le supprime
        if (null !== $this->tempFilename) {
            $oldFile = $this->getUploadRootDir().'/'.$this->id.'.'.$this->tempFilename;
            if (file_exists($oldFile)) {
                unlink($oldFile);
            }
        }

        // On déplace le fichier envoyé dans le répertoire de notre choix
        $this->file->move(
            $this->getUploadRootDir(), // Le répertoire de destination
            $this->id.'.'.$this->uri   // Le nom du fichier à créer, ici "id.extension"
        );
        $path = $this->getUploadRootDir().$this->id.'-origin.'.$this->uri;
    }


    /**
    * @ORM\PreRemove
    */
    public function preRemoveUpload()
    {
        $nonRetinaImgPath = '../../uploads/'.$this->id.'.'.$this->uri;
        $retinaImgPath = '../../uploads/'.$this->id.'-2x.'.$this->uri;
        $tabletImgPath = '../../uploads/'.$this->id.'-tablet.'.$this->uri;

        // On sauvegarde temporairement le nom du fichier car il dépend de l'id
        $this->tempFilename = $this->getUploadRootDir().'/'.$this->id.'.'.$this->uri;
    }

    /**
    * @ORM\PostRemove
    */
    public function removeUpload()
    {
        // En PostRemove, on n'a pas accès à l'id, on utilise notre nom sauvegardé
        if (file_exists($this->tempFilename)) 
        {
            // On supprime le fichier
            unlink($this->tempFilename);
        }
    }

    /**
     * Retourne le chemin relatif complet vers l'image pour un navigateur
     */
    public function getWebPath()
    {
        return $this->getUploadDir().$this->getId().'.'.$this->geturi();
    }

    /**
     * Retourne le chemin relatif vers l'image pour un navigateur
     */
    public function getUploadDir()
    {
        return 'uploads/';
    }


    /**
     * Retourne le chemin relatif vers l'image pour le code PHP
     */
    protected function getUploadRootDir()
    {
        return __DIR__.'/../../../../web/'.$this->getUploadDir();
    }

    /**
     * Get file
     *
     * @return file
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * Set file
     *
     * @param file $file
     * @return Picture
     */
    public function setFile($file)
    {
        $this->file = $file;

        if ($this->uri !== null)
        {
            $this->tempFilename = $this->uri;
            $this->uri = null;
            $this->title = null;
        }

        return $this;
    }
}
